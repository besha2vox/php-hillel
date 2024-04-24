<?php

declare(strict_types=1);

namespace Car;

class Car
{
    public function __construct(private string $brand, private string $model, private string|null $fault)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->fault = $fault;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getFault(): string|null
    {
        return $this->fault;
    }

    public function setFault(string|null $fault): void
    {
        $this->fault = $fault;
    }
}