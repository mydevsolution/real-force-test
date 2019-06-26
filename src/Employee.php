<?php

namespace App;

use Money\Money;

/**
 * Class Employee
 * @package App
 */
class Employee
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Money
     */
    protected $grossSalary;

    /**
     * @var int
     */
    protected $age;

    /**
     * @var int
     */
    protected $kids;

    /**
     * @var bool
     */
    protected $isUseCompanyCar;

    /**
     * Employee constructor.
     * @param string $name
     * @param int $age
     * @param int $kids
     * @param bool $isUseCompanyCar
     * @param Money $grossSalary
     */
    public function __construct(string $name, int $age, int $kids, bool $isUseCompanyCar, Money $grossSalary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->kids = $kids;
        $this->isUseCompanyCar = $isUseCompanyCar;
        $this->grossSalary = $grossSalary;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return int
     */
    public function getKids(): int
    {
        return $this->kids;
    }

    /**
     * @return bool
     */
    public function isUseCompanyCar(): bool
    {
        return $this->isUseCompanyCar;
    }

    /**
     * @return \Money\Money
     */
    public function getGrossSalary(): Money
    {
        return $this->grossSalary;
    }
}