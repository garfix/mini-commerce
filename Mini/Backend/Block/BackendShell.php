<?php

namespace Mini\Backend\Block;

use Mini\Core\Block;
use Mini\Core\Shell;

/**
 * @author Patrick van Bergen
 */
class BackendShell extends Shell
{
//    /**
//     * @var Block
//     */
//    protected $mainBlock;
//
//    public function __construct(Block $mainBlock)
//    {
//        $this->mainBlock = $mainBlock;
//    }

    public function renderWithChild(Block $child)
    { ?>

        <html>
        <head>
            <?php Header::resolve()->render() ?>
        </head>
        <body>
        <?php Menu::resolve()->render() ?>
        <?php $child->render() ?>
        </body>
        </html>

        <?php
    }
}