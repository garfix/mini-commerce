<?php

namespace Mini\Frontend\Block;

use Mini\Core\Block;

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