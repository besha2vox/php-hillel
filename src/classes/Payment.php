<?php

class Payment {
    private Order $order;

    public function __construct(Order $order) {
        $this->order = $order;
    }

    public function processPayment(): void {
        $carOwner = $this->order->getCarOwner();
        $totalPrice = $this->order->getTotalPrice();
        $carOwner->deductBalance($totalPrice);
        echo "Payment successful.\n";
        $this->generateReceipt();
    }

    private function generateReceipt(): void {
        $carOwner = $this->order->getCarOwner();
        $car = $this->order->getCar();
        $products = $this->order->getProducts();
        $totalPrice = $this->order->getTotalPrice();
        $balanceBeforePayment = $carOwner->getBalance() + $totalPrice;
        $balanceAfterPayment = $carOwner->getBalance();

        $receipt = "Receipt:\n";
        $receipt .= "Name of Car Owner: {$carOwner->getName()}\n";
        $receipt .= "Car: {$car->getBrand()} {$car->getModel()}\n";
        $receipt .= "Replaced Parts:\n";
        foreach ($products as $product) {
            $receipt .= "- {$product->getName()}: {$product->getPrice()}$\n";
        }
        $receipt .= "Repair Cost: {$this->order->getRepairCost()}$\n";
        $receipt .= "Balance Before Payment: {$balanceBeforePayment}$\n";
        $receipt .= "Balance After Payment: {$balanceAfterPayment}$\n";

        echo $receipt;
    }
}