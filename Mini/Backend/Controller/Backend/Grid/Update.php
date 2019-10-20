<?php

namespace Mini\Backend\Controller\Backend\Grid;

use Mini\Backend\Block\Grid;
use Mini\Core\Context;
use Mini\Core\RequestHandler;
use Mini\Core\Response;

/**
 * @author Patrick van Bergen
 */
class Update extends RequestHandler
{
    public function createResponse(): Response
    {
        $get = Context::getRequest()->getGet();
        $class = $get['class'];
        $page = (int)$get['pageNumber'];
        /** @var Grid $grid */
        $grid = new $class();
        $grid->setPageNumber($page);
        $data = $grid->getAjaxData();

        return new Response(['Content-type: application/json'], json_encode($data));
    }
}