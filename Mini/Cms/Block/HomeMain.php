<?php

namespace Mini\Cms\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class HomeMain extends Block
{

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render(array $childBlocks): string
    {
        return 'home';
    }
}