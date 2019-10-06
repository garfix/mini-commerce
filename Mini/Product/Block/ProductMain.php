<?php

namespace Mini\Product\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class ProductMain extends Block
{
    public function getChildren(): array
    {
        return [
            PriceBlock::class
        ];
    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render(array $childBlocks): string
    {
        return 'product main ' . $childBlocks[PriceBlock::class];
    }
}