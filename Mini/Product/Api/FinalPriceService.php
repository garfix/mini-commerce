<?php

namespace Mini\Product\Api;

/**
 * @author Patrick van Bergen
 */
interface FinalPriceService
{
    public function getFinalPrice(int $productId);
}