<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Header extends Block
{
    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render(): string
    {
        return 'header';
    }
}