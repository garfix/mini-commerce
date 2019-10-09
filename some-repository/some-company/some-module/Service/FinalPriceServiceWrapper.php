<?php

namespace SomeCompany\SomeModule\Service;

use Mini\Product\Api\FinalPriceService;

/**
 * @author Patrick van Bergen
 */
class FinalPriceServiceWrapper extends FinalPriceService
{
    /**
     * @var FinalPriceService
     */
    protected $innerModel;

    public function __construct(FinalPriceService $innerModel)
    {
        $this->innerModel = $innerModel;
    }

    public function getFinalPrice(int $productId)
    {
        return $this->innerModel->getFinalPrice($productId) + 20;
    }
}