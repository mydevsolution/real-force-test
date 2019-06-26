<?php

namespace App\Rules;

use Money\Money;
use App\Employee;

/**
 * Class EmployeeUsingCarRule
 * @package App\Rules
 */
class EmployeeUsingCarRule implements SalaryCalculationRuleInterface
{
    /**
     * @var Money
     */
    protected $amount;

    /**
     * @var Employee
     */
    protected $employee;

    /**
     * EmployeeUsingCarRule constructor.
     * @param Employee $employee
     * @param Money $amount
     */
    public function __construct(Employee $employee, Money $amount)
    {
        $this->employee = $employee;
        $this->amount = $amount;
    }

    /**
     * @return Money
     */
    public function getAmount(): Money
    {
        if ($this->employee->isUseCompanyCar()) {
            return $this->amount->negative();
        } else {
            return new Money(0, $this->employee->getGrossSalary()->getCurrency());
        }
    }
}