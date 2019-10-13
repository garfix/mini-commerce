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
        $productId = ProductPageContext::getProductId();

        $finalPrice = FinalPriceService::resolve()->getFinalPrice($productId);

        echo '<div class="price">[product id: ' . $productId . '; price: ' . $finalPrice  . ']</div>';
    }
}