<?php

namespace SomeCompany\SomeModule\Block;

use Mini\Catalog\Block\PriceBlock;

/**
 * @author Patrick van Bergen
 */
class SomePriceBlock extends PriceBlock
{
    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    { ?>

[some module product id <?php $this->innerBlock->render() ?> ]

    <?php
    }
}