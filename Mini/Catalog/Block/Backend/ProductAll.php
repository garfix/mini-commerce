<?php

namespace Mini\Catalog\Block\Backend;

use Mini\Backend\Block\ButtonLink;
use Mini\Catalog\Lang\CatalogTranslator;
use Mini\Core\Api\Link;
use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class ProductAll extends Block
{
    public function renderStyleTag()
    {
    }

    /**
     * @return void
     */
    public function render()
    {
        $t = CatalogTranslator::resolve();
        ?>

        <?php ButtonLink::resolve()->setLabel($t::addProduct)->setLink(Link::resolve()->create('page=catalog/product/add'))->render() ?>
        <?php ProductGrid::resolve()->render() ?>
        <?php ProductGrid::resolve()->render() ?>
    <?php
    }
}