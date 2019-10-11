<?php

namespace SomeCompany\SomeModule\Block;

use Mini\Core\Block;
use Mini\Catalog\Block\PriceBlock;

/**
 * @author Patrick van Bergen
 */
class SomePriceBlock extends PriceBlock
{
    /**
     * @var PriceBlock
     */
    protected $innerBlock;

    public function __construct(Block $innerBlock)
    {
        $this->innerBlock = $innerBlock;
    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    { ?>

[some module product id <?php $this->innerBlock->render([]) ?> ]

    <?php
    }
}