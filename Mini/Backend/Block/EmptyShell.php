<?php

namespace Mini\Backend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class EmptyShell extends Block
{
    public function renderStyleTag()
    {
    }

    public function render()
    { ?>
        ##style##
        ##main##
        ##script##
        <?php
    }
}