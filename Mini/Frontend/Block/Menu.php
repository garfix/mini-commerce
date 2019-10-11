<?php

namespace Mini\Frontend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class Menu extends Block
{
    public function render(): string
    {
        return 'menu';
    }
}