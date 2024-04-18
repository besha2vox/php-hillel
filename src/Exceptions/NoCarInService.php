<?php

namespace Exceptions;

class NoCarInService extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('No car in service');
    }
}