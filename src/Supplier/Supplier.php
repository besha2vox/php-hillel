<?php

declare(strict_types=1);

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
        $index = null;
        foreach ($products as $key => $product) {
            if ($product->getName() === $productName) {
                $index = $key;
                break;
            }
        }
        if(!isset($index)) {
            throw new SupplierException($productName);
        }


        $product = $products[$index];

        return $product;
    }
}