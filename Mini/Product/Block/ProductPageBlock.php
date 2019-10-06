<?php

namespace Mini\Product\Block;

use Mini\Core\Block;
use Mini\Core\PageShell;

/**
 * @author Patrick van Bergen
 */
class ProductPageBlock extends Block
{
    public function getChildren(): array
    {
        return [
            PageShell::class
        ];
    }

    /**
     * @param Block[] $childBlocks
     * @return string
     */
    public function render(array $childBlocks): string
    {
        $contents = 'product page';

        $contents .= $childBlocks[PageShell::class];

        return $contents;
    }
}