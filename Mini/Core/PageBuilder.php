<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class PageBuilder
{
    public function buildPage(string $mainBlockClass): string
    {
        return $this->buildBlock(new PageShell($mainBlockClass));
    }

    protected function buildBlock(Block $block): string
    {
        $children = $block->getChildren();

        $childBlocks = [];
        foreach ($children as $child) {
            $childBlock = new $child();
            $childContents = $this->buildBlock($childBlock);
            $childBlocks[$child] = $childContents;
        }

        $contents = $block->render($childBlocks);

        return $contents;
    }
}