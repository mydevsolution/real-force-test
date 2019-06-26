<?php

namespace App;

use Money\Money;
use App\Rules\SalaryCalculationRuleInterface;

/**
 * Class EmployeeSalaryCalculation
 * @package App
 */
class EmployeeSalaryCalculation
{
    /**
     * @var SalaryCalculationRuleInterface[]
     */
    protected $rules;


    public function __construct()
    {
        $this->rules = [];
    }

    /**
     * @param SalaryCalculationRuleInterface $salaryCalculationRuleInterface
     */
    public function addRule(SalaryCalculationRuleInterface $salaryCalculationRuleInterface): void
    {
        array_push($this->rules, $salaryCalculationRuleInterface);
    }

    /**
     * @param \App\Employee $employee
     * @return Money
     */
    public function calculate(Employee $employee)
    {
        $netSalary = $employee->getGrossSalary();

        foreach ($this->rules as $rule) {
            $amount = $rule->getAmount();
            $netSalary = $netSalary->add($amount);
        }

        return $netSalary;
    }
}