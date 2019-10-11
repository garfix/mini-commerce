<?php

namespace Mini\Core\Api;

use Mini\Core\Block;
use Mini\Core\Service;

/**
 * @author Patrick van Bergen
 */
class PageBuilder extends Service
{
    public function buildPage(Block $page): string
    {
        ob_start();
        $page->render();
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }
}