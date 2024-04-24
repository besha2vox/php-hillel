<?php

declare(strict_types=1);

namespace Supplier;

class Supplier
{
    private string $name;
    private array $products = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getProduct(string $productName): Product
    {
        $products = $this->getProducts();
        $index = array_search($productName, array_column($products, 'name'));
        return $products[$index];
    }
}