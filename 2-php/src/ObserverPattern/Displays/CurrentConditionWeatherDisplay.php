<?php

namespace DesignPatterns\ObserverPattern\Displays;

class CurrentConditionWeatherDisplay extends WeatherDisplay
{
    public function update(string $message): void
    {
        $data = json_decode($message);

        echo sprintf('Current conditions: Temperature %sF, Humidity %s%%',
            $data->temperature,
            $data->humidity
        );
    }
}