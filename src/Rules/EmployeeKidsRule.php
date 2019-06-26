<?php

namespace App\Rules;

use Money\Money;
use App\Employee;

/**
 * Class EmployeeKidsRule
 * @package App\Rules
 */
class EmployeeKidsRule implements SalaryCalculationRuleInterface
{
    /**
     * @var Employee
     */
    protected $employee;

    /**
     * @var float
     */
    protected $percent;

    /**
     * EmployeeKidsRule constructor.
     * @param Employee $employee
     * @param float $percent
     */
    public function __construct(Employee $employee, float $percent)
    {
        $this->employee = $employee;
        $this->percent = $percent;
    }

    /**
     * @return Money
     */
    public function getAmount(): Money
    {
        if ($this->employee->getKids() > 2) {
            return $this->employee->getGrossSalary()->multiply($this->percent)->divide(100)->negative();
        } else {
            return new Money(0, $this->employee->getGrossSalary()->getCurrency());
        }
    }
}