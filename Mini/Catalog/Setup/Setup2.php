<?php

namespace Mini\Catalog\Setup;

use Mini\Core\Context;
use Mini\Core\Setup;

/**
 * @author Patrick van Bergen
 */
class Setup2 extends Setup
{
    public function execute()
    {
        Context::getDb()->createAttributeTable('product', 'price', 'decimal(12,4)', false, true);
    }
}