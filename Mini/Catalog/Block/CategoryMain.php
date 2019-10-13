<?php

namespace Mini\Catalog\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class CategoryMain extends Block
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
        echo 'category main';
    }
}