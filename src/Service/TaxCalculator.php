<?php

namespace App\Service;

class TaxCalculator
{
    private $taxRates = [
        'DE' => 0.19,
        'IT' => 0.22,
        'FR' => 0.20,
        'GR' => 0.24,
    ];

    public function calculateTax($taxNumber, $price)
    {
        $countryCode = substr($taxNumber, 0, 2);
        $taxRate = $this->taxRates[$countryCode];
        return $price * $taxRate;
    }
}