<?php

namespace SomeCompany\SomeModule\Service;

use Mini\Catalog\Api\FinalPriceService;

/**
 * @author Patrick van Bergen
 */
class FinalPriceServiceDecorator extends FinalPriceService
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