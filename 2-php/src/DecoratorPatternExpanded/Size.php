<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPatternExpanded;

enum Size: string
{
    case TALL = 'Tall';
    case GRANDE = 'Grande';
    case VENTI = 'Venti';
}
