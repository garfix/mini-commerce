<?php

namespace Mini\Backend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class BackendShell extends Block
{
    /**
     * @var Block
     */
    protected $mainBlock;

    public function __construct(Block $mainBlock)
    {
        $this->mainBlock = $mainBlock;
    }

    public function render()
    { ?>

        <html>
            <head>
            <?php Header::resolve()->render() ?>
            </head>
            <body>
                <?php Menu::resolve()->render() ?>
                <?php $this->mainBlock->render() ?>
            </body>
        </html>

        <?php
    }
}