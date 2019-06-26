<?php

namespace App\Rules;

use Money\Money;

/**
 * Interface SalaryCalculationRuleInterface
 * @package App\Rules
 */
interface SalaryCalculationRuleInterface
{
    /**
     * @return Money
     */
    public function getAmount(): Money;
}