<?php

namespace DesignPatterns\ObserverPattern\Data;

use DesignPatterns\ObserverPattern\Displays\ObserverInterface;
use SplObjectStorage;

class WeatherData implements SubjectInterface
{
    private SplObjectStorage $observers;

    public function __construct(
        private float $temperature,
        private float $humidity,
        private float $pressure,
    ) {
        $this->observers = new SplObjectStorage();
    }

    private function measurementsChange(): void
    {
        $this->notifyObservers();
    }

    public function setTemperature(float $temperature): void
    {
        $this->temperature = $temperature;
        $this->measurementsChange();
    }

    public function setHumidity(float $humidity): void
    {
        $this->humidity = $humidity;
        $this->measurementsChange();
    }

    public function setPressure(float $pressure): void
    {
        $this->pressure = $pressure;
        $this->measurementsChange();
    }

    public function registerObserver(ObserverInterface $observer): void
    {
        $this->observers->attach($observer);
    }

    public function removeObserver(ObserverInterface $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notifyObservers(): void
    {
        $message = json_encode([
            'temperature' => $this->temperature,
            'humidity' => $this->humidity,
            'pressure' => $this->pressure,
        ]);

        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}