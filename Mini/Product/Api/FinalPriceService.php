<?php

namespace Mini\Product\Api;

/**
 * @author Patrick van Bergen
 */
class FinalPriceService
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