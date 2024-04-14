<?php

class Mechanic extends Worker
{
    private Car|null $car = null;

    public function getCarForService(Car $car): void
    {
        $this->car = $car;
    }

    public function checkCar(): string|null
    {
        $this->checkCarInService();
        $fault = $this->car->getFault();

        if (!$fault) {
            throw new Exception("No faults detected!\n");
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
            throw new Exception("No car in service\n");
        }
    }
}