<?php

namespace Mini\Backend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class BackendShell extends Block
{
    public function render()
    { ?>

        <html>
        <head>
            <?php Header::resolve()->render() ?>
        </head>
        <body>
        <?php Menu::resolve()->render() ?>
        ##main##
        </body>
        </html>

        <?php
    }
}