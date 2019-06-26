<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\SalaryCalculator;
use App\Employee;
use Money\Money;


$employee1 = new Employee('Alice', 26, 2, false, Money::USD(6000));
$salary1 = SalaryCalculator::calculateEmployeeSalary($employee1);

$employee2 = new Employee('Bob', 52, 0, true, Money::USD(4000));
$salary2 = SalaryCalculator::calculateEmployeeSalary($employee2);

$employee3 = new Employee('Charlie', 36, 3, true, Money::USD(5000));
$salary3 = SalaryCalculator::calculateEmployeeSalary($employee3);

var_dump($salary1->getAmount(), $salary2->getAmount(), $salary3->getAmount());