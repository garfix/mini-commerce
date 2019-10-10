<?php

namespace SomeOtherCompany\SomeOtherModule\Block;

use Mini\Core\Block;
use Mini\Product\Block\PriceBlock;

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

        [some other module product id <?php $this->innerBlock->render([]) ?> ]

    <?php
    }

}