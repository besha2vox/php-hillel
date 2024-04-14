<?php

class AutoWorkshop
{
    private array $workers;

    public function __construct(private string $name, private array $priceList)
    {
        $this->name = $name;
        $this->workers = [];
        $this->priceList = $priceList;
    }

    public function hireWorker(Worker $worker): void
    {
        $this->workers[] = $worker;
    }

    public function getWorkers(): array
    {
        return $this->workers;
    }

    public function getPrice(string $fault): float
    {
        return $this->priceList[$fault];
    }
}