<?php

namespace Mini\Catalog\Api;

use Mini\Core\Context;
use Mini\Core\Service;

/**
 * @author Patrick van Bergen
 */
class ProductSaverService extends Service
{
    public function createProduct(): int
    {
        return Context::getDb()->createEntity('product');
    }

    public function storeAttribute(int $productId, string $attributeCode, $attributeValue)
    {
        Context::getDb()->setAttribute('product', $productId, $attributeCode, $attributeValue);
    }
}