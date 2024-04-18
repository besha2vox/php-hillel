<?php

namespace Supplier;

use Exceptions\SupplierException;

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
        $product = $products[$index];

        if(!$product) {
            throw new SupplierException($productName);
        }

        return $product;
    }
}