<?php

namespace SomeOtherCompany\SomeOtherModule\Api;

use Mini\Core\ServiceWrapper;

/**
 * @author Patrick van Bergen
 */
class FinalPriceService extends ServiceWrapper
{
    public function execute(int $productId)
    {
        return $this->innerService->execute($productId) + 10;
    }
}