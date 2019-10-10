<?php

namespace Mini\Backend\Block;

use Mini\Core\Block;
use Mini\Core\Link;

/**
 * @author Patrick van Bergen
 */
class Menu extends Block
{

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    {
        ?>
        <a href="<?= Link::resolve()->create('product/add') ?>">Add product</a>
        <?php
    }
}