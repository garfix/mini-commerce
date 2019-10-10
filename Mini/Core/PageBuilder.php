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

        ob_start();
        $shell->render();
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }
}