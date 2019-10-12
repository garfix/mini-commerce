<?php

namespace Mini\Frontend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class FrontendShell extends Block
{
    public function renderStyleTag()
    {
    }

    public function render()
    { ?>

        <html>
            <head>
            <?php Header::resolve()->render() ?>
            </head>
            <body>
                <?php Menu::resolve()->render() ?>
                ##main##
                <ul>
                <?php for ($i = 0; $i < 5; $i++) : ?>
                    <li><?= $i ?></li>
                <?php endfor; ?>
                </ul>
            </body>
        </html>

        <?php
    }
}