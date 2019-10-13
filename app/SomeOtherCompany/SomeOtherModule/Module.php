<?php

namespace SomeOtherCompany\SomeOtherModule;

use Mini\Core\BasicModule;
use Mini\Catalog\Block\PriceBlock;
use Mini\Catalog\Api\FinalPriceService;
use Mini\Frontend\Form\Element\InputText;
use SomeOtherCompany\SomeOtherModule\Block\InputTextDecorator;
use SomeOtherCompany\SomeOtherModule\Service\FinalPriceServiceDecorator;
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

    public function getBlockDecorators(): array
    {
        return [
            PriceBlock::class => SomePriceBlock::class,
            InputText::class => InputTextDecorator::class,
        ];
    }

    public function getServiceDecorators(): array
    {
        return [
            FinalPriceService::class => FinalPriceServiceDecorator::class
        ];
    }
}