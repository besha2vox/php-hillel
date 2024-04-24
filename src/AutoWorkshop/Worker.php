<?php

declare(strict_types=1);

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
        echo sprintf("Hello! My name is %s. I'm %s", $this->name, $this->getPosition() . PHP_EOL);
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    abstract public function calculateSalary(): void;
}