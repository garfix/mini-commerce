<?php

namespace SomeOtherCompany\SomeOtherModule\Block;

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

        [some other module product id <?php $this->innerBlock->render() ?> ]

        <?= $this->hidden ?>

    <?php
    }

}