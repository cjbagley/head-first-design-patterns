<?php

namespace DesignPatterns\ObserverPattern\Displays;

use DesignPatterns\ObserverPattern\Data\WeatherDataDTO;

interface GetDisplayStringInterface
{
    public function getDisplayString(WeatherDataDTO $data): string;
}