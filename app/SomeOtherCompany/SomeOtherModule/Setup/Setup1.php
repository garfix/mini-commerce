<?php

/**
 * @author Patrick van Bergen
 */
class Setup1
{
    public function execute()
    {
        MiniAttribute::create('product', 'color', 'integer');
    }
}