<?php

namespace Mini\Catalog\Api;

use Mini\Core\Service;

/**
 * @author Patrick van Bergen
 */
class FinalPriceService extends Service
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