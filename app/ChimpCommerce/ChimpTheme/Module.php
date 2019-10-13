<?php

namespace ChimpCommerce\ChimpTheme;

use ChimpCommerce\ChimpTheme\Block\PriceBlockDecorator;
use Mini\Catalog\Block\PriceBlock;
use Mini\Core\BasicModule;

/**
 * @author Patrick van Bergen
 */
class Module extends BasicModule
{
    public function getFrontName()
    {
        return 'chimp-theme';
    }

    public function getBlockDecorators(): array
    {
        return [
            PriceBlock::class => PriceBlockDecorator::class
        ];
    }

    public function getServiceDecorators(): array
    {
        return [

        ];
    }
}