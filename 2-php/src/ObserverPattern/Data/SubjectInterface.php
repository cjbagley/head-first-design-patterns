<?php

namespace DesignPatterns\ObserverPattern\Data;

use DesignPatterns\ObserverPattern\Displays\ObserverInterface;

interface SubjectInterface
{
    public function registerObserver(ObserverInterface $observer): void;

    public function removeObserver(ObserverInterface $observer): void;

    public function notifyObservers(): void;
}
