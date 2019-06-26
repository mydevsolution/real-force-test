<?php

namespace App;

use Money\Money;
use App\Rules\EmployeeAgeRule;
use App\Rules\EmployeeCountryTaxRule;
use App\Rules\EmployeeKidsRule;
use App\Rules\EmployeeUsingCarRule;

/**
 * Class SalaryCalculator
 * @package App
 */
class SalaryCalculator
{
    /**
     * @param \App\Employee $employee
     * @return Money
     */
    public static function calculateEmployeeSalary(Employee $employee): Money
    {
        $salaryCalculation = new EmployeeSalaryCalculation();
        // apply tax for all employee
        $salaryCalculation->addRule(new EmployeeCountryTaxRule($employee, 20));
        $salaryCalculation->addRule(new EmployeeAgeRule($employee, 7));
        $salaryCalculation->addRule(new EmployeeKidsRule($employee, 2));
        $salaryCalculation->addRule(new EmployeeUsingCarRule($employee, Money::USD(500)));

        return $salaryCalculation->calculate($employee);
    }
}