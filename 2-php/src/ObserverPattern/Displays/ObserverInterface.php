<?php

namespace DesignPatterns\ObserverPattern\Displays;

use DesignPatterns\ObserverPattern\Data\WeatherDataDTO;

interface ObserverInterface
{
    public function update(WeatherDataDTO $data): void;
}