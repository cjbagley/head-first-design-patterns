<?php

declare(strict_types=1);

namespace DesignPatterns\CompositePattern;

use Override;

class Menu extends AbstractMenuComponent
{
    /**
     * @var AbstractMenuComponent[]
     */
    private array $menuComponents = [];

    public function __construct(
        private readonly string $name,
        private readonly string $description,
    ) {
    }

    #[Override]
    public function add(AbstractMenuComponent $menuComponent): void
    {
        $this->menuComponents[] = $menuComponent;
    }

    #[Override]
    public function remove(AbstractMenuComponent $menuComponent): void
    {
        $key = array_search($menuComponent, $this->menuComponents, true);
        if ($key !== false) {
            unset($this->menuComponents[$key]);
        }
    }

    #[Override]
    public function getChild(int $index): AbstractMenuComponent
    {
        return $this->menuComponents[$index];
    }

    #[Override]
    public function getName(): string
    {
        return $this->name;
    }

    #[Override]
    public function getDescription(): string
    {
        return $this->description;
    }

    #[Override]
    public function __toString(): string
    {
        $string = sprintf(
            "\n%s, %s\n--------------------------\n",
            $this->name,
            $this->description,
        );

        foreach ($this->menuComponents as $menuItem) {
            $string .= $menuItem . "\n";
        }

        return $string;
    }
}
