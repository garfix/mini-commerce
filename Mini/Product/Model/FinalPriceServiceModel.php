<?php

namespace Mini\Product\Model;

use Mini\Product\Api\FinalPriceService;

/**
 * @author Patrick van Bergen
 */
class FinalPriceServiceModel implements FinalPriceService
{
    protected function calculatePrice($price)
    {
        return $price;
    }

    public function getFinalPrice(int $productId)
    {
        return 100;
    }
}