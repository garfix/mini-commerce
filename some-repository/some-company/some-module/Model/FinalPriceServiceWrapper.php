<?php

namespace SomeCompany\SomeModule\Model;

use Mini\Core\ServiceWrapper;

/**
 * @author Patrick van Bergen
 */
class FinalPriceServiceWrapper extends ServiceWrapper
{
    public static function getFinalPrice(callable $innerMethod, int $productId)
    {
        return $innerMethod($productId) + 20;
    }
}