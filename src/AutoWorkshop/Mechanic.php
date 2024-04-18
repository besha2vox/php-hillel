<?php

namespace AutoWorkshop;

use Car\Car;
use Exceptions\NoCarInService;

class Mechanic extends Worker
{
    private Car|null $car = null;
    protected string $position = 'mechanic';

    public function __construct(string $name, float $baseSalary, private float $coefficient)
    {
        $this->coefficient = $coefficient;
        parent::__construct($name, $baseSalary);
    }

    public function getCarForService(Car $car): void
    {
        $this->car = $car;
    }


    public function checkCar(): string|null
    {
        $this->checkCarInService();
        $fault = $this->car->getFault();

        if (!$fault) {
            throw new NoCarInService("No faults detected!\n");
        }

        echo "A defective part has been detected: $fault \n";
        return $this->car->getFault();
    }

    public function repairCar(): void
    {
        $this->checkCarInService();
        $this->car->setFault(null);
        echo "The car is fixed.\n";
    }

    private function checkCarInService(): void
    {
        if (!$this->car) {
            throw new NoCarInService();
        }
    }

    public function calculateSalary(): void
    {
        $this->salary = $this->baseSalary * $this->coefficient;
    }
}