<?php

namespace Mini\Product\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class CategoryMain extends Block
{

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render(array $childBlocks): string
    {
        return 'category main';
    }
}