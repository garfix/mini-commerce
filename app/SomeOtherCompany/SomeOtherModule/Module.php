<?php

namespace SomeOtherCompany\SomeOtherModule;

use Mini\Core\BasicModule;
use Mini\Product\Block\PriceBlock;
use Mini\Product\Model\FinalPriceServiceModel;
use SomeOtherCompany\SomeOtherModule\Model\FinalPriceServiceWrapper;
use SomeOtherCompany\SomeOtherModule\Block\SomePriceBlock;

/**
 * @author Patrick van Bergen
 */
class Module extends BasicModule
{
    public function getFrontName()
    {
        return 'some-other';
    }

    public function getBlockWrappers(): array
    {
        return [
            PriceBlock::class => SomePriceBlock::class
        ];
    }

    public function getServiceWrappers(): array
    {
        return [
            FinalPriceServiceModel::class => FinalPriceServiceWrapper::class
        ];
    }
}