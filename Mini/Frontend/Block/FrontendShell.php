<?php

namespace Mini\Frontend\Block;

use Mini\Core\Block;
use Mini\Core\Shell;

/**
 * @author Patrick van Bergen
 */
class FrontendShell extends Shell
{
    public function renderWithChild(Block $child)
    { ?>

        <html>
            <head>
            <?php Header::resolve()->render() ?>
            </head>
            <body>
                <?php Menu::resolve()->render() ?>
                <?php $child->render() ?>
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