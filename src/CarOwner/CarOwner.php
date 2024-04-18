<?php

namespace CarOwner;

use Car\Car;

class CarOwner
{
    public function __construct(private string $name, private float $balance, private Car $car)
    {
        $this->name = $name;
        $this->balance = $balance;
        $this->car = $car;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCar(): Car
    {
        return $this->car;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function deductBalance(float $amount): void
    {
        $this->balance -= $amount;
    }
}