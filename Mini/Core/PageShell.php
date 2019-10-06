<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class PageShell extends Block
{
    /**
     * @var string
     */
    protected $mainBlockClass;

    public function __construct(string $mainBlockClass)
    {
        $this->mainBlockClass = $mainBlockClass;
    }

    public function getChildren(): array
    {
        return [
            Header::class,
            Menu::class,
            $this->mainBlockClass
        ];
    }

    public function render(array $childBlocks): string
    {
        return 'shell ' . $childBlocks[Header::class] . ' ' . $childBlocks[Menu::class] . ' ' . $childBlocks[$this->mainBlockClass];
    }
}