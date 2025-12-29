<?php

declare(strict_types=1);

namespace DesignPatterns\CompositePattern;

use LogicException;
use Throwable;

class UnsupportedOperationException extends LogicException
{
    public function __construct(
        string $message = 'Operation not supported',
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
