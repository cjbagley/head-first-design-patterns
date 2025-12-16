<?php

namespace DesignPatterns\ObserverPatternPull\Tests;

use DesignPatterns\ObserverPatternPull\Data\WeatherData;
use DesignPatterns\ObserverPatternPull\Displays\CurrentConditionWeatherDisplay;
use DesignPatterns\ObserverPatternPull\Displays\ForecastWeatherDisplay;
use DesignPatterns\ObserverPatternPull\Displays\StatisticsWeatherDisplay;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class DisplayTest extends TestCase
{
    /**
     * @throws Exception
     */
    #[Test]
    public function displays_update_following_weather_updates(): void
    {
        $weather_data = $this->getWeatherData();

        $forecast_display = $this->createMock(ForecastWeatherDisplay::class);
        $forecast_display->expects($this->exactly(3))->method('update');

        $current_condition_display = $this->createMock(CurrentConditionWeatherDisplay::class);
        $current_condition_display->expects($this->exactly(1))->method('update');

        $statistics_display = $this->createMock(StatisticsWeatherDisplay::class);
        $statistics_display->expects($this->exactly(2))->method('update');

        $weather_data->registerObserver($forecast_display);
        $weather_data->registerObserver($current_condition_display);
        $weather_data->registerObserver($statistics_display);

        $weather_data->setTemperature(30);

        $weather_data->removeObserver($current_condition_display);

        $weather_data->setHumidity(40);

        $weather_data->removeObserver($statistics_display);

        $weather_data->setPressure(20);
    }

    #[Test]
    public function current_conditions_display_outputs_updated_values_after_temperature_change(): void
    {
        $weather_data = $this->getWeatherData();
        $display = new CurrentConditionWeatherDisplay($weather_data);

        $weather_data->registerObserver($display);

        $weather_data->setTemperature(30);

        self::assertSame(
            'Current conditions: Temperature 30F, Humidity 30%',
            $display->display()
        );
    }

    #[Test]
    public function forecast_display_outputs_updated_values_after_humidity_change(): void
    {
        $weather_data = $this->getWeatherData();
        $display = new ForecastWeatherDisplay($weather_data);

        $weather_data->registerObserver($display);

        $weather_data->setHumidity(40);

        self::assertSame(
            'Forecast: Temp. 20F with 40% humidity',
            $display->display()
        );
    }

    #[Test]
    public function statistics_display_outputs_updated_values_after_pressure_change(): void
    {
        $weather_data = $this->getWeatherData();
        $display = new StatisticsWeatherDisplay($weather_data);

        $weather_data->registerObserver($display);

        $weather_data->setPressure(20);

        self::assertSame(
            'Stats: 20F | 30% | 20P',
            $display->display()
        );
    }

    /**
     * @return WeatherData
     */
    private function getWeatherData(): WeatherData
    {
        return new WeatherData(
            temperature: 20,
            humidity: 30,
            pressure: 10,
        );
    }
}
