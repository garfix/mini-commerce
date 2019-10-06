<?php

namespace SomeOtherCompany\SomeOtherModule\Block;

use Mini\Core\BlockWrapper;
use Mini\Product\ProductPageContext;

/**
 * @author Patrick van Bergen
 */
class SomePriceBlock extends BlockWrapper
{
    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render(array $childBlocks): string
    {
        return '[some other module product id: ' . ProductPageContext::getProductId() .
            $this->innerBlock->render($childBlocks) . ']';
    }
}