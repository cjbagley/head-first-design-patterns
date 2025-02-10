<?php

namespace DesignPatterns\ObserverPattern\Displays;

interface ObserverInterface
{
    public function update(string $message): void;
}