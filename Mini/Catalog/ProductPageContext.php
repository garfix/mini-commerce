<?php

namespace Mini\Catalog;

use Mini\Core\Context;

/**
 * @author Patrick van Bergen
 */
class ProductPageContext extends Context
{
    protected static $productId;

    public static function setProductId($productId)
    {
        self::$productId = $productId;
    }

    public static function getProductId()
    {
        return self::$productId;
    }
}