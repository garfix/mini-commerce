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
            $finalBlock = $this->getFinalBlock($child);
            $childContents = $this->buildBlock($finalBlock);
            $childBlocks[$child] = $childContents;
        }

        $contents = $block->render($childBlocks);

        return $contents;
    }

    protected function getFinalBlock($baseClass)
    {
        $finalBlock = new $baseClass();

        foreach (Context::getModules() as $module) {
            foreach ($module->getBlockWrappers() as $base => $override) {
                if ($base === $baseClass) {
                    $finalBlock = new $override($finalBlock);
                }
            }
        }

        return $finalBlock;
    }
}