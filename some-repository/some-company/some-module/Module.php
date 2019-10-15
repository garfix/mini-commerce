<?php

namespace SomeCompany\SomeModule;

use Mini\Core\BasicModule;
use Mini\Catalog\Block\PriceBlock;
use Mini\Catalog\Api\FinalPriceService;
use Mini\Frontend\Form\Element\InputText;
use SomeCompany\SomeModule\Block\InputTextDecorator;
use SomeCompany\SomeModule\Block\SomePriceBlock;
use SomeCompany\SomeModule\Service\FinalPriceServiceDecorator;

/**
 * @author Patrick van Bergen
 */
class Module extends BasicModule
{
    public function getFrontName()
    {
        return 'some';
    }

    public function getBlockDecorators(): array
    {
        return [
            PriceBlock::class => SomePriceBlock::class,
            //InputText::class => InputTextDecorator::class,
        ];
    }

    public function getServiceDecorators(): array
    {
        return [
            FinalPriceService::class => FinalPriceServiceDecorator::class
        ];
    }
}