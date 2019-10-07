<?php

namespace Mini\Product\Block;

use Mini\Core\Block;
use Mini\Product\Api\FinalPriceService;
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
        $productId = ProductPageContext::getProductId();

        $finalPrice = FinalPriceService::getFinalPrice($productId);

        return '[product id: ' . $productId . '; price: ' . $finalPrice  . ']';
    }
}