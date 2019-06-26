<?php

namespace App\Rules;

use Money\Money;
use App\Employee;

/**
 * Class EmployeeCountryTaxRule
 * @package App\Rules
 */
class EmployeeCountryTaxRule implements SalaryCalculationRuleInterface
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
     * EmployeeCountryTaxRule constructor.
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
        return $this->employee->getGrossSalary()->multiply($this->percent)->divide(100)->negative();
    }
}