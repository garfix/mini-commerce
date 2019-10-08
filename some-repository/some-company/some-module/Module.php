<?php

namespace SomeCompany\SomeModule;

use Mini\Core\BasicModule;
use Mini\Product\Block\PriceBlock;
use Mini\Product\Model\FinalPriceServiceModel;
use SomeCompany\SomeModule\Block\SomePriceBlock;
use SomeCompany\SomeModule\Model\FinalPriceServiceWrapper;

/**
 * @author Patrick van Bergen
 */
class Module extends BasicModule
{
    public function getFrontName()
    {
        return 'some';
    }

    public function getBlockWrappers(): array
    {
        return [
            PriceBlock::class => SomePriceBlock::class
        ];
    }

    public function getModelWrappers(): array
    {
        return [
            FinalPriceServiceModel::class => FinalPriceServiceWrapper::class
        ];
    }
}