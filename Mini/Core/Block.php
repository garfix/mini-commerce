<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class Block
{
    public function getChildren(): array
    {
        return [];
    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public abstract function render(array $childBlocks): string;
}