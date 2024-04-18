<?php

use \AutoWorkshop\AutoWorkshop;
use \AutoWorkshop\Mechanic;
use \AutoWorkshop\Cashier;
use \CarOwner\CarOwner;
use \Car\Car;
use \Supplier\Supplier;
use \Supplier\Product;

try {
    $supplier = new Supplier("Auto Parts Supplier");
    $engine = new Product("Engine", 1000.0);
    $tire = new Product("Tire", 200.0);

    $supplier->addProduct($engine);
    $supplier->addProduct($tire);

    $priceList = ["Engine" => 200.0, "Tire" => 50.0];
    $autoWorkshop = new AutoWorkshop("Pimp my Ride", $priceList);
    $mechanic = new Mechanic("John", 400, 1.8);
    $cashier = new Cashier("Alice",300, 450);
    $autoWorkshop->hireWorker($mechanic);
    $autoWorkshop->hireWorker($cashier);

    $car = new Car("Toyota", "Corolla", "Engine");
    $carOwner = new CarOwner("Bob", 2500.0, $car);

    $mechanic->greetings();
    $mechanic->getCarForService($carOwner->getCar());
    $fault = $mechanic->checkCar();

    $product = $supplier->getProduct($fault);
    $amount = $product->getPrice() + $autoWorkshop->getPrice($fault);
    $order = $cashier->createOrder($carOwner, $product, $amount);

    $cashier->greetings();
    $cashier->processPayment($order);

    $mechanic->repairCar();
    $mechanic->checkCar();

} catch (Exception $error) {
    echo $error->getMessage() . "\n";
}