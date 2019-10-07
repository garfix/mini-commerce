<?php

namespace Mini\Product\Api;

use Mini\Core\Service;
use Mini\Core\ServiceProcessor;
use Mini\Product\Model\FinalPriceServiceModel;

/**
 * @author Patrick van Bergen
 */
class FinalPriceService extends Service
{
    public static function getFinalPrice(int $productId)
    {
        return ServiceProcessor::getMethod(FinalPriceServiceModel::class, 'getFinalPrice')($productId);
    }
}