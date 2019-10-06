<?php

namespace SomeOtherCompany\SomeOtherModule;

use Mini\Core\BasicModule;
use Mini\Product\Block\PriceBlock;
use SomeOtherCompany\SomeOtherModule\Api\FinalPriceService;
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
            \Mini\Product\Api\FinalPriceService::class => FinalPriceService::class
        ];
    }
}