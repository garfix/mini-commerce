<?php

namespace Mini\Core\Api;

use Mini\Core\Block;
use Mini\Core\Context;
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
        $style = $this->getStyle();

        $contents = preg_replace('/##main##/', $mainContents, $shellContents);
        $contents = preg_replace('/##style##/', $style, $contents);
        return $contents;
    }

    protected function getStyle()
    {
        ob_start();

#todo these are only the wrapped blocks, not the inner blocks
        foreach (Context::getBlockResolver()->getResolvedBlocks() as $block) {
            $block->renderStyleTag();
        }

        $style = ob_get_contents();
        ob_end_clean();

        return $style;
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