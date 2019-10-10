<?php

namespace Mini\Dashboard\Block\Backend;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class Dashboard extends Block
{

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    {
        ?>
        dashboard
        <?php
    }
}