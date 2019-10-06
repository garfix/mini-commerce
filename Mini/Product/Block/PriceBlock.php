<?php

namespace Mini\Product\Block;

use Mini\Core\Block;
use Mini\Product\ProductPageContext;

/**
 * @author Patrick van Bergen
 */
class PriceBlock extends Block
{

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render(array $childBlocks): string
    {
        return '[product id: ' . ProductPageContext::getProductId() . ']';
    }
}