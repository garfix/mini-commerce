<?php

namespace Mini\Backend\Block;

use Mini\Core\Api\Link;
use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class Menu extends Block
{
    public function renderStyleTag()
    {
        ?>
        <style>
            .menu {
                position: absolute;
                width: 200px;
            }
            .menu-item {
                background-color: lightblue;
            }
        </style>
        <?php
    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    {
        ?>
        <div class="menu">
            <div class="menu-item"><a href="<?= Link::resolve()->create('page=/') ?>">Home</a></div>
            <div class="menu-item"><a href="<?= Link::resolve()->create('page=catalog/product/all') ?>">Products</a></div>
        </div>
        <?php
    }
}