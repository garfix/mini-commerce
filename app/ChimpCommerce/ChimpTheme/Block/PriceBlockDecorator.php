<?php

namespace ChimpCommerce\ChimpTheme\Block;

use Mini\Catalog\Block\PriceBlock;

/**
 * @author Patrick van Bergen
 */
class PriceBlockDecorator extends PriceBlock
{
    public function renderStyleTag()
    {
        ?>
            <style>
                .price {
                    color: red
                }
            </style>
        <?php
    }

}