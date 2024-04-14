<?php

class Cashier extends Worker {
    private bool $isOrderCreated = false;
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
        if(!$this->isOrderCreated) {
            throw new Exception("Order has not been created\n");
        }
        $payment = new Payment($order);
        echo "Payment processed by cashier.\n";
        $payment->processPayment();
    }
}