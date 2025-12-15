<?php

namespace DesignPatterns\ObserverPatternPush\Displays;

use DesignPatterns\ObserverPatternPush\Data\WeatherDataDTO;

interface ObserverInterface
{
    public function update(WeatherDataDTO $data): void;
}
