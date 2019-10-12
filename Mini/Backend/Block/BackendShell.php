<?php

namespace Mini\Backend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class BackendShell extends Block
{
    public function renderStyleTag()
    {
        ?>
        <style>
            .main {
                margin-left: 200px;
                padding: 20px;
            }
            </style>
        <?php
    }

    public function render()
    { ?>

        <html>
        <head>
            <?php Header::resolve()->render() ?>
             ##style##
        </head>
        <body>
        <?php Menu::resolve()->render() ?>
        <div class="main">
            ##main##
        </div>
        </body>
        </html>

        <?php
    }
}