<?php

namespace AutoWorkshop;

abstract class Worker
{
    protected string $position;
    protected float $salary;

    public function __construct(protected string $name, protected float $baseSalary)
    {
        $this->name = $name;
        $this->baseSalary = $baseSalary;
    }

    public function greetings(): void
    {
        echo "Hello! My name is $this->name. I'm $this->getPosition().";
    }

    abstract public function calculateSalary(): void;

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getPosition(): string
    {
        return $this->position;
    }
}