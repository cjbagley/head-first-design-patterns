<?php

declare(strict_types=1);

namespace DesignPatterns\AdapterPattern\Expanded;

use Exception;

readonly class EnumerationIterator implements IteratorInterface
{
    public function __construct(private EnumerationInterface $enumerator)
    {
    }

    public function hasNext(): bool
    {
        return $this->enumerator->hasMoreElements();
    }

    public function next(): int
    {
        return $this->enumerator->nextElement();
    }

    /**
     * @throws Exception
     */
    public function remove(): void
    {
        throw new \Exception('Not supported');
    }
}
