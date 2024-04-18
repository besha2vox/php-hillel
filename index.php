<?php

require_once 'autoloader.php';

use AutoWorkshop\AutoWorkshop;
use AutoWorkshop\Cashier;
use AutoWorkshop\Mechanic;
use Car\Car;
use CarOwner\CarOwner;
use Supplier\Product;
use Supplier\Supplier;
use Exceptions\NoCarInService;
use Exceptions\CashierException;
use Exceptions\SupplierException;

try {
    $supplier = new Supplier("Auto Parts Supplier");
    $engine = new Product("Engine", 1000.0);
    $tire = new Product("Tire", 200.0);

    $supplier->addProduct($engine);
    $supplier->addProduct($tire);

    $priceList = ["Engine" => 200.0, "Tire" => 50.0];
    $autoWorkshop = new AutoWorkshop("Pimp my Ride", $priceList);
    $mechanic = new Mechanic("John", 400, 1.8);
    $cashier = new Cashier("Alice", 300, 450);
    $autoWorkshop->hireWorker($mechanic);
    $autoWorkshop->hireWorker($cashier);

    $car = new Car("Toyota", "Corolla", "Engine");
    $carOwner = new CarOwner("Bob", 2500.0, $car);

    $mechanic->greetings();
    $mechanic->getCarForService($carOwner->getCar());
    $fault = $mechanic->checkCar();

    $product = $supplier->getProduct($fault);
    $amount = $product->getPrice() + $autoWorkshop->getPrice($fault);

    $cashier->greetings();
    $order = $cashier->createOrder($carOwner, $product, $amount);
    $cashier->processPayment($order);

    $mechanic->repairCar();

    $mechanic->calculateSalary();
    $cashier->calculateSalary();
    echo 'Salary of a ' . $mechanic->getPosition() . ': ' . $mechanic->getSalary() . "\n";
    echo 'Salary of a ' . $cashier->getPosition() . ': ' . $cashier->getSalary() . "\n";


} catch (NoCarInService $error) {
    echo $error->getMessage() . "\n";
} catch (CashierException $error) {
    echo $error->getMessage() . "\n";
} catch (SupplierException $error) {
    echo $error->getMessage() . "\n";
}