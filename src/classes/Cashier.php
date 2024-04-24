<?php

declare(strict_types=1);

namespace AutoWorkshop;

use Supplier\Product;
use Payment\Payment;
use CarOwner\CarOwner;
use Exception;

class Cashier extends Worker
{
    private bool $isOrderCreated = false;
    protected string $position = 'cashier';

    public function __construct(string $name, float $baseSalary, private float $bonus)
    {
        $this->bonus = $bonus;
        parent::__construct($name, $baseSalary);
    }

    public function createOrder(CarOwner $carOwner, Product $product, float $amount): Order
    {
        if ($carOwner->getBalance() < $amount) {
            throw new Exception("Not enough money\n");
        }

        $order = new Order($carOwner, [$product], $amount);
        $this->isOrderCreated = true;
        echo "Order created\n";

        return $order;
    }

    public function processPayment(Order $order): void
    {
        if (!$this->isOrderCreated) {
            throw new Exception("Order has not been created\n");
        }
        $payment = new Payment($order);
        echo "Payment processed by cashier.\n";
        $payment->processPayment();
    }

    public function calculateSalary(): void
    {
        $this->salary = $this->baseSalary + $this->bonus;
    }
}