<?php

namespace SomeCompany\SomeModule;

use Mini\Core\BasicModule;
use Mini\Catalog\Block\PriceBlock;
use Mini\Catalog\Api\FinalPriceService;
use Mini\Frontend\Form\Element\InputText;
use SomeCompany\SomeModule\Block\InputTextWrapper;
use SomeCompany\SomeModule\Block\SomePriceBlock;
use SomeCompany\SomeModule\Service\FinalPriceServiceWrapper;

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