<?php

use SomeCompany\SomeModule\Header;

/**
 * @author Patrick van Bergen
 */
class ProductPage
{
    public function getBlocks()
    {
        return [
            Header::class => Header::class
        ];
    }
}