<?php

namespace Mini\Core;

use Mini\Cms\Block\HomeMain;
use Mini\Product\Block\CategoryMain;
use Mini\Product\Block\ProductMain;

/**
 * @author Patrick van Bergen
 */
class Main extends Block
{
    public function getChildren(): array
    {
        return [
            ProductMain::class,
            CategoryMain::class,
            HomeMain::class,
        ];
    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render(array $childBlocks): string
    {
        switch (Context::getRequest()->getPageType()) {

        }
    }
}