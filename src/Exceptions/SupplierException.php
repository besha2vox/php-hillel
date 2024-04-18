<?php

namespace Exceptions;

class SupplierException extends \RuntimeException
{
    public function __construct(string $productName)
    {
        parent::__construct("Unfortunately, the product ($productName) you specified is out of stock");
    }
}