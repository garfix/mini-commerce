<?php

namespace SomeOtherCompany\SomeOtherModule\Api;

use Mini\Core\ServiceWrapper;

/**
 * @author Patrick van Bergen
 */
class FinalPriceServiceWrapper extends ServiceWrapper
{
    public static function getFinalPrice(callable $innerMethod, int $productId)
    {
        return $innerMethod($productId) + 10;
    }
}