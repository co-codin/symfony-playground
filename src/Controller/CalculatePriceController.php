<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\PriceCalculator;

class CalculatePriceController
{
    private $priceCalculator;

    public function __construct(PriceCalculator $priceCalculator)
    {
        $this->priceCalculator = $priceCalculator;
    }

    public function calculatePrice(Request $request)
    {
        $product = $request->get('product');
        $taxNumber = $request->get('taxNumber');
        $couponCode = $request->get('couponCode');
        $price = $this->priceCalculator->calculatePrice($product, $taxNumber, $couponCode);
        return new Response(['price' => $price], 200);
    }
}