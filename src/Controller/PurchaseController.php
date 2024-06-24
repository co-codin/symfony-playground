<?php

namespace App\Controller;

use App\Service\PaymentProcessor;

class PurchaseController
{
    private $paymentProcessor;

    public function __construct(PaymentProcessor $paymentProcessor)
    {
        $this->paymentProcessor = $paymentProcessor;
    }
}