<?php

declare(strict_types=1);

namespace DesignPatterns\ObserverPatternPush\Data;

use DesignPatterns\ObserverPatternPush\Displays\ObserverInterface;
use SplObjectStorage;

class WeatherData implements SubjectInterface
{
    /**
     * @var SplObjectStorage<ObserverInterface, null> $observers
     */
    private readonly SplObjectStorage $observers;

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
        $data = WeatherDataDTO::create(
            temperature: $this->temperature,
            humidity: $this->humidity,
            pressure: $this->pressure,
        );

        foreach ($this->observers as $observer) {
            $observer->update($data);
        }
    }
}
