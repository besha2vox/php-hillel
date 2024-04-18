<?php

namespace Exceptions;

class CashierException extends \RuntimeException
{
    public function __construct(private string $type)
    {
        $msg = match($type) {
            'money' => 'Not enough money',
            'order' => 'Order has not been created'
        };

        parent::__construct($msg);
    }
}