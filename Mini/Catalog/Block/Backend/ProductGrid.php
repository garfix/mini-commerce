<?php

namespace Mini\Catalog\Block\Backend;

use Mini\Backend\Block\ButtonLink;
use Mini\Backend\Block\Grid;
use Mini\Backend\Block\GridAction;
use Mini\Catalog\Lang\CatalogTranslator;
use Mini\Core\Api\Link;
use Mini\Core\Block;
use Mini\Core\Context;

/**
 * @author Patrick van Bergen
 */
class ProductGrid extends Grid
{
    public function __construct(Block $inner = null)
    {
        parent::__construct($inner);

        $t = CatalogTranslator::resolve();

        $values = [];
        $actions = [];
        $productIds = Context::getDb()->getEntityIds('product');
        foreach ($productIds as $productId) {
            $values[] = [
                'id' => $productId,
                'name' => Context::getDb()->getAttributeValue('product', $productId, 'name'),
                'price' => Context::getDb()->getAttributeValue('product', $productId, 'price'),
            ];
            $actions[] = [
                GridAction::resolve()->setLabel('View')->setUrl(Link::resolve()->create('page=catalog/product/edit&id=' . $productId))
            ];
        }

        $this
            ->setColumns([
                'id' =>  $t::id,
                'name' => $t::name,
                'price' => $t::price,
                'actions' => $t::action,
            ])
            ->setValues($values)
            ->setActions($actions);
    }
}