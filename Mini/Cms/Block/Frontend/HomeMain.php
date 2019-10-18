<?php

namespace Mini\Cms\Block\Frontend;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class HomeMain extends Block
{
    /**
     * @return void
     */
    public function renderStyleTag()
    {
    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    {
        echo 'home';
    }

}