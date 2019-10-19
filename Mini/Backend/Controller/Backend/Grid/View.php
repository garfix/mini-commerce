<?php

namespace Mini\Backend\Controller\Backend\Grid;

use Mini\Backend\Block\EmptyShell;
use Mini\Backend\Block\Grid;
use Mini\Core\Api\PageBuilder;
use Mini\Core\Context;
use Mini\Core\RequestHandler;
use Mini\Core\Response;

/**
 * @author Patrick van Bergen
 */
class View extends RequestHandler
{
    public function createResponse(): Response
    {
        $get = Context::getRequest()->getGet();
        $class = $get['class'];
        $page = (int)$get['pageNumber'];
        /** @var Grid $grid */
        $grid = new $class();
        $grid->setPageNumber($page);
        $html = PageBuilder::resolve()->buildPage(EmptyShell::resolve(), $grid);

        return new Response([], $html);
    }
}