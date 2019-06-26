<?php

use PHPUnit\Framework\TestCase;

use \App\Employee;
use Money\Money;
use \App\SalaryCalculator;

final class SalaryCalculatorTest extends TestCase
{
    /**
     * @param Employee $employee
     * @param Money $expected
     * @dataProvider calculateEmployeeSalaryProvider
     */
    public function testCalculateEmployeeSalary(Employee $employee, Money $expected)
    {
        $salary = SalaryCalculator::calculateEmployeeSalary($employee);
        $this->assertEquals($salary, $expected);
    }

    public function calculateEmployeeSalaryProvider()
    {
        return [
            [
                new Employee('Alice', 26, 2, false, Money::USD(6000)),
                Money::USD(4800),
            ],
            [
                new Employee('Bob', 52, 0, true, Money::USD(4000)),
                Money::USD(2980),
            ],
            [
                new Employee('Charlie', 36, 3, true, Money::USD(5000)),
                Money::USD(3400),
            ],
        ];
    }
}
