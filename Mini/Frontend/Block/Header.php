<?php

namespace Mini\Frontend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class Header extends Block
{
    public function renderStyleTag()
    {
    }

    public function render()
    {
        return 'header';
    }
}