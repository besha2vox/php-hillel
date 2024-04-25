<?php

declare(strict_types=1);

namespace AutoWorkshop;

use CarOwner\CarOwner;
use Exceptions\CashierException;
use Payment\Payment;
use Supplier\Product;

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
        global $console;
        if ($carOwner->getBalance() < $amount) {
            throw new CashierException("money");
        }

        $order = new Order($carOwner, [$product], $amount);
        $this->isOrderCreated = true;
        $console->printInfo("Order created");

        return $order;
    }

    public function processPayment(Order $order): void
    {
        global $console;
        if (!$this->isOrderCreated) {
            throw new CashierException('order');
        }
        $payment = new Payment($order);
        $console->printInfo("Payment processed by cashier.");
        $payment->processPayment();
    }

    public function calculateSalary(): void
    {
        $this->salary = $this->baseSalary + $this->bonus;
    }
}