<?php

namespace DesignPatterns\ObserverPatternPull\Data;

use DesignPatterns\ObserverPatternPull\Displays\ObserverInterface;

interface SubjectInterface
{
    public function registerObserver(ObserverInterface $observer): void;

    public function removeObserver(ObserverInterface $observer): void;

    public function notifyObservers(): void;
}
