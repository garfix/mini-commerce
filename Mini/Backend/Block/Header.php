<?php

namespace Mini\Backend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class Header extends Block
{
    /**
     * @param string[] $childBlocks
     */
    public function render()
    {
        ?>
        header
        <?php
    }
}