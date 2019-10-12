<?php

namespace Mini\Catalog\Block;

use Mini\Core\Block;
use Mini\Catalog\Api\FinalPriceService;
use Mini\Catalog\ProductPageContext;

/**
 * @author Patrick van Bergen
 */
class PriceBlock extends Block
{
    protected $hidden = 'hidden';

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    {
        $productId = ProductPageContext::getProductId();

        $finalPrice = FinalPriceService::resolve()->getFinalPrice($productId);

        echo '[product id: ' . $productId . '; price: ' . $finalPrice  . ']';
    }
}