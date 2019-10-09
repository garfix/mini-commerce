<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class PageBuilder extends Service
{
    public function buildPage(Block $mainBlock): string
    {
        $shell = new PageShell($mainBlock);
        return $shell->render();
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