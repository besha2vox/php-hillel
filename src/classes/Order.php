<?php

class Order
{
    private float $totalPrice = 0;
    private float $productsPrice = 0;

    public function __construct(private CarOwner $carOwner, private array $products, private float $repairCost)
    {
        $this->carOwner = $carOwner;
        $this->products = $products;
        $this->repairCost = $repairCost;
        $this->calculateTotalPrice();
    }

    private function calculateTotalPrice(): void
    {
        foreach ($this->products as $product) {
            $this->productsPrice += $product->getPrice();
        }
        $this->totalPrice = $this->repairCost + $this->productsPrice;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function getCarOwner(): CarOwner
    {
        return $this->carOwner;
    }

    public function getCar(): Car
    {
        return $this->carOwner->getCar();
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getRepairCost(): float
    {
        return $this->repairCost;
    }
}