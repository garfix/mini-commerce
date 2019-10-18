<?php

namespace Mini\Catalog\Block\Frontend;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class ProductMain extends Block
{
    /**
     * @return void
     */
    public function renderStyleTag()
    {
    }

    /**
     * @return void
     */
    public function render()
    {
        ?>
        [product main
        <?php PriceBlock::resolve()->render([]) ?>
        ]
        <?php
    }
}