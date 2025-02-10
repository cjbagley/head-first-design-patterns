<?php

namespace DesignPatterns\ObserverPattern\Tests;

use DesignPatterns\ObserverPattern\Data\WeatherData;
use DesignPatterns\ObserverPattern\Displays\CurrentConditionWeatherDisplay;
use DesignPatterns\ObserverPattern\Displays\ForecastWeatherDisplay;
use DesignPatterns\ObserverPattern\Displays\StatisticsWeatherDisplay;
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
        $forecast_display = $this->createMock(ForecastWeatherDisplay::class);
        $forecast_display->expects($this->exactly(3))->method('update');

        $current_condition_display = $this->createMock(CurrentConditionWeatherDisplay::class);
        $current_condition_display->expects($this->exactly(1))->method('update');

        $statistics_display = $this->createMock(StatisticsWeatherDisplay::class);
        $statistics_display->expects($this->exactly(2))->method('update');

        $weather_data = new WeatherData(
            temperature: 20,
            humidity: 30,
            pressure: 10,
        );

        $weather_data->registerObserver($forecast_display);
        $weather_data->registerObserver($current_condition_display);
        $weather_data->registerObserver($statistics_display);

        $weather_data->setTemperature(30);

        $weather_data->removeObserver($current_condition_display);

        $weather_data->setHumidity(40);

        $weather_data->removeObserver($statistics_display);

        $weather_data->setPressure(20);
    }
}