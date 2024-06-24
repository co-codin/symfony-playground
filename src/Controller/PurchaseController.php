<?php

namespace App\Controller;

use App\Service\PriceCalculator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\PaymentProcessor;

class PurchaseController
{
    private $paymentProcessor;

    private $priceCalculator;

    public function __construct(PaymentProcessor $paymentProcessor, PriceCalculator $priceCalculator)
    {
        $this->paymentProcessor = $paymentProcessor;

        $this->priceCalculator = $priceCalculator;
    }

    public function purchase(Request $request)
    {
        $product = $request->get('product');
        $taxNumber = $request->get('taxNumber');
        $couponCode = $request->get('couponCode');
        $paymentProcessor = $request->get('paymentProcessor');
        $price = $this->priceCalculator->calculatePrice($product, $taxNumber, $couponCode);
        $this->paymentProcessor->pay($price);
        return new Response(['message' => 'Payment successful'], 200);
    }
}