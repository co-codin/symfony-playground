<?php

namespace App\Service;

class PriceCalculator
{
    private $taxCalculator;

    public function __construct(TaxCalculator $taxCalculator)
    {
        $this->taxCalculator = $taxCalculator;
    }

    public function calculatePrice($product, $taxNumber, $couponCode)
    {
        $price = $product->getPrice();
        $tax = $this->taxCalculator->calculateTax($taxNumber, $price);
        $couponDiscount = $this->getCouponDiscount($couponCode, $price);
        return $price + $tax - $couponDiscount;
    }

    private function getCouponDiscount($couponCode, $price)
    {
        // Implement coupon discount logic
    }
}