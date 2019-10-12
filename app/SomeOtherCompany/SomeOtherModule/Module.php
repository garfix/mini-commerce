<?php

namespace SomeOtherCompany\SomeOtherModule;

use Mini\Core\BasicModule;
use Mini\Catalog\Block\PriceBlock;
use Mini\Catalog\Api\FinalPriceService;
use Mini\Frontend\Form\Element\InputText;
use SomeOtherCompany\SomeOtherModule\Block\InputTextWrapper;
use SomeOtherCompany\SomeOtherModule\Service\FinalPriceServiceWrapper;
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
            PriceBlock::class => SomePriceBlock::class,
            InputText::class => InputTextWrapper::class,
        ];
    }

    public function getServiceWrappers(): array
    {
        return [
            FinalPriceService::class => FinalPriceServiceWrapper::class
        ];
    }
}