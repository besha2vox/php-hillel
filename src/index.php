<?php

define('CLASSES_DIR', __DIR__ . '/classes/');

require CLASSES_DIR . 'Supplier.php';
require CLASSES_DIR . 'Product.php';
require CLASSES_DIR . 'AutoWorkshop.php';
require CLASSES_DIR . 'Worker.php';
require CLASSES_DIR . 'Mechanic.php';
require CLASSES_DIR . 'Car.php';
require CLASSES_DIR . 'CarOwner.php';
require CLASSES_DIR . 'Order.php';
require CLASSES_DIR . 'Payment.php';
require CLASSES_DIR . 'Cashier.php';

try {
    $supplier = new Supplier("Auto Parts Supplier");
    $engine = new Product("Engine", 1000.0);
    $tire = new Product("Tire", 200.0);

    $supplier->addProduct($engine);
    $supplier->addProduct($tire);

    $priceList = ["Engine" => 200.0, "Tire" => 50.0];
    $autoWorkshop = new AutoWorkshop("Pimp my Ride", $priceList);
    $mechanic = new Mechanic("John");
    $cashier = new Cashier("Alice");
    $autoWorkshop->hireWorker($mechanic);
    $autoWorkshop->hireWorker($cashier);

    $car = new Car("Toyota", "Corolla", "Engine");
    $carOwner = new CarOwner("Bob", 2500.0, $car);

    $mechanic->getCarForService($carOwner->getCar());
    $fault = $mechanic->checkCar();

    $product = $supplier->getProduct($fault);
    $amount = $product->getPrice() + $autoWorkshop->getPrice($fault);
    $order = $cashier->createOrder($carOwner, $product, $amount);
    $cashier->processPayment($order);

    $mechanic->repairCar();
    $fault = $mechanic->checkCar();

} catch (Exception $error) {
    echo $error->getMessage() . "\n";
}