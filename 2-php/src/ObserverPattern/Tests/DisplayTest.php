<?php

namespace DesignPatterns\ObserverPattern\Tests;

use DesignPatterns\ObserverPattern\Data\WeatherData;
use DesignPatterns\ObserverPattern\Data\WeatherDataDTO;
use DesignPatterns\ObserverPattern\Displays\CurrentConditionWeatherDisplay;
use DesignPatterns\ObserverPattern\Displays\ForecastWeatherDisplay;
use DesignPatterns\ObserverPattern\Displays\StatisticsWeatherDisplay;
use DesignPatterns\ObserverPattern\Displays\WeatherDisplay;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * This test class can be improved, but as this is not
 * a production app, and it's just a repo for learning
 * and reference, I will leave as is for now.
 */
class DisplayTest extends TestCase
{
    /**
     * @return array<string, array{array{WeatherDisplay}}>
     */
    public static function dataProvider(): array
    {
        return [
            'Displays' => [
                [
                    new CurrentConditionWeatherDisplay(),
                    new ForecastWeatherDisplay(),
                    new StatisticsWeatherDisplay(),
                ]
            ],
        ];
    }

    private function getDisplayLineRegex(string $line): string
    {
        return '/^'.preg_quote($line, '/').'$/m';
    }

    /**
     * @param  array{WeatherDisplay}  $displays
     */
    #[Test]
    #[DataProvider('dataProvider')]
    public function displays_update_following_weather_updates(array $displays): void
    {
        $data = WeatherDataDTO::create(20, 20, 20);

        $weather_data = new WeatherData(
            temperature: $data->temperature,
            humidity: $data->humidity,
            pressure: $data->pressure,
        );

        /** @var WeatherDisplay $display */
        foreach ($displays as $display) {
            $string = $display->getDisplayString($data);
            self::expectOutputRegex($this->getDisplayLineRegex($string));
        }

        // Make sure previous output not counted in update checks
        ob_clean();

        // Test temperature update
        $data = WeatherDataDTO::create(38, 20, 20);
        $weather_data->setTemperature($data->temperature);

        /** @var WeatherDisplay $display */
        foreach ($displays as $display) {
            $string = $display->getDisplayString($data);
            self::expectOutputRegex($this->getDisplayLineRegex($string));
        }

        // Test humidity update
        $data = WeatherDataDTO::create(38, 26, 20);
        $weather_data->setHumidity($data->humidity);

        /** @var WeatherDisplay $display */
        foreach ($displays as $display) {
            $string = $display->getDisplayString($data);
            self::expectOutputRegex($this->getDisplayLineRegex($string));
        }

        // Test pressure update
        $data = WeatherDataDTO::create(38, 26, 10);
        $weather_data->setPressure($data->pressure);

        /** @var WeatherDisplay $display */
        foreach ($displays as $display) {
            $string = $display->getDisplayString($data);
            self::expectOutputRegex($this->getDisplayLineRegex($string));
        }
    }
}