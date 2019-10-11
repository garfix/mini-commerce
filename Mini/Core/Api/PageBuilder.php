<?php

namespace Mini\Core\Api;

use Mini\Core\Block;
use Mini\Core\Service;

/**
 * @author Patrick van Bergen
 */
class PageBuilder extends Service
{
    public function buildPage(Block $shell, Block $main): string
    {
        $shellContents = $this->getContents($shell);
        $mainContents = $this->getContents($main);

        $contents = preg_replace('/##main##/', $mainContents, $shellContents);
        return $contents;
    }

    protected function getContents(Block $block)
    {
        ob_start();
        $block->render();
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }
}