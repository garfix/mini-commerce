<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class PageShell extends Block
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