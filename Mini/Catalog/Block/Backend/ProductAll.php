<?php

namespace Mini\Catalog\Block\Backend;

use Mini\Core\Api\Link;
use Mini\Core\Block;
use Mini\Core\Context;

/**
 * @author Patrick van Bergen
 */
class ProductAll extends Block
{

    /**
     * @return void
     */
    public function render()
    {
        $productIds = Context::getDb()->getEntityIds('product');

        ?>

        <?php foreach ($productIds as $productId) : ?>
            <div>
                <a href="<?= Link::resolve()->create('page=catalog/product/edit&id=' . $productId) ?>">
                <?= Context::getDb()->getAttributeValue('product', $productId, 'name') ?>
                </a>
            </div>
        <?php endforeach ?>

    <?php
    }
}