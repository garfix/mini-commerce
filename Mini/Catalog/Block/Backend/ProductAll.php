<?php

namespace Mini\Catalog\Block\Backend;

use Mini\Backend\Block\ButtonLink;
use Mini\Core\Api\Link;
use Mini\Core\Block;
use Mini\Core\Context;

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
        $productIds = Context::getDb()->getEntityIds('product');

        ?>

        <?php ButtonLink::resolve()->setLabel('Add product')->setLink(Link::resolve()->create('page=catalog/product/add'))->render() ?>

        <?php foreach ($productIds as $productId) : ?>
            <div>
                <a href="<?= Link::resolve()->create('page=catalog/product/edit&id=' . $productId) ?>">
                <?= Context::getDb()->getAttributeValue('product', $productId, 'name') ?>
                </a>
                <?= Context::getDb()->getAttributeValue('product', $productId, 'price') ?>
            </div>
        <?php endforeach ?>

    <?php
    }
}