<?php

namespace Mini\Dashboard\Block\Backend;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class Dashboard extends Block
{
    /**
     * @return void
     */
    public function renderStyleTag()
    {

    }

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