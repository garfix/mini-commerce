<?php

namespace Mini\Core\Api;

use Mini\Core\Block;
use Mini\Core\Service;
use Mini\Core\Shell;

/**
 * @author Patrick van Bergen
 */
class PageBuilder extends Service
{
    public function buildPage(Shell $shell, Block $page): string
    {
        ob_start();
        $shell->renderWithChild($page);
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }
}