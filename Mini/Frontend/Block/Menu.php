<?php

namespace Mini\Frontend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class Menu extends Block
{
    public function renderStyleTag()
    {
    }

    public function render()
    {
        return 'menu';
    }
}