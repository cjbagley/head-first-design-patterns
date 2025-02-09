<?php

namespace DesignPatterns\ObserverPattern\Data;

readonly class WeatherDataDTO
{
    private function __construct(
        public float $temperature,
        public float $humidity,
        public float $pressure,
    ) {
    }

    public static function create(float $temperature, float $humidity, float $pressure): self
    {
        return new self($temperature, $humidity, $pressure);
    }
}