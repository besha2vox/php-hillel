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
        if ($carOwner->getBalance() < $amount) {
            throw new CashierException("money");
        }

        $order = new Order($carOwner, [$product], $amount);
        $this->isOrderCreated = true;
        echo "Order created\n";

        return $order;
    }

    public function processPayment(Order $order): void
    {
        if (!$this->isOrderCreated) {
            throw new CashierException('order');
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