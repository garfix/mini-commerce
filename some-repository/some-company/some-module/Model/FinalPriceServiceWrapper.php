<?php

namespace SomeCompany\SomeModule\Model;

use Mini\Product\Model\FinalPriceServiceModel;

/**
 * @author Patrick van Bergen
 */
class FinalPriceServiceWrapper extends FinalPriceServiceModel
{
    /**
     * @var FinalPriceServiceModel
     */
    protected $innerModel;

    public function __construct(FinalPriceServiceModel $innerModel)
    {
        $this->innerModel = $innerModel;
    }

    public function getFinalPrice(int $productId)
    {
        return $this->innerModel->getFinalPrice($productId) + 20;
    }
}