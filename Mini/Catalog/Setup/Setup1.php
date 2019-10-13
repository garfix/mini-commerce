<?php

namespace Mini\Catalog\Setup;

use Mini\Core\Context;
use Mini\Core\Setup;

/**
 * @author Patrick van Bergen
 */
class Setup1 extends Setup
{
    public function execute()
    {
        Context::getDb()->createEntityTable('product');
        Context::getDb()->createAttributeTable('product', 'name', 'varchar(255)', false, true);
    }
}