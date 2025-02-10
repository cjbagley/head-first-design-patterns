<?php

namespace DesignPatterns\ObserverPattern\Displays;

class StatisticsWeatherDisplay extends WeatherDisplay
{
    public function update(string $message): void
    {
        $data = json_decode($message);

        echo sprintf('Stats: %sF | %s%% | %sP',
            $data->temperature,
            $data->humidity,
            $data->pressure,
        );
    }
}