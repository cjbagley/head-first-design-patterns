<?php

namespace DesignPatterns\ObserverPatternPush\Data;

use DesignPatterns\ObserverPatternPush\Displays\ObserverInterface;

interface SubjectInterface
{
    public function registerObserver(ObserverInterface $observer): void;

    public function removeObserver(ObserverInterface $observer): void;

    public function notifyObservers(): void;
}
