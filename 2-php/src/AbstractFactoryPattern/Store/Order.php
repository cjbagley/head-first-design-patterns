<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\Store;

enum Order
{
    case Pepperoni;
    case Clam;
    case Veggie;
    case Cheese;
}
