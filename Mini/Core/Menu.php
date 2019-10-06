<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Menu extends Block
{
    public function render(array $childBlocks): string
    {
        return 'menu';
    }
}