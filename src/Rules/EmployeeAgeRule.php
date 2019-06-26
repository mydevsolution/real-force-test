<?php

namespace App\Rules;

use Money\Money;
use App\Employee;

/**
 * Class EmployeeAgeRule
 * @package App\Rules
 */
class EmployeeAgeRule implements SalaryCalculationRuleInterface
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
     * EmployeeAgeRule constructor.
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
        if ($this->employee->getAge() > 50) {
            return $this->employee->getGrossSalary()->multiply($this->percent)->divide(100);
        } else {
            return new Money(0, $this->employee->getGrossSalary()->getCurrency());
        }
    }
}