<?php

namespace Mini\Product\Setup;

use Mini\Core\Context;

/**
 * @author Patrick van Bergen
 */
class Setup1
{
    public function execute()
    {
        Context::getDb()->createEntityTable('product');
        Context::getDb()->createAttributeTable('product', 'name', 'varchar(255)', false, true);
    }
}