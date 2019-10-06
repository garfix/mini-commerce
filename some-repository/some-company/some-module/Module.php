<?php

namespace SomeCompany\SomeModule;

use Mini\Core\BasicModule;
use Mini\Product\Block\PriceBlock;
use SomeCompany\SomeModule\Block\SomePriceBlock;

/**
 * @author Patrick van Bergen
 */
class Module extends BasicModule
{
    public function getFrontName()
    {
        return 'some';
    }

    public function getBlockOverrides(): array
    {
        return [
            PriceBlock::class => SomePriceBlock::class
        ];
    }
}