<?php

namespace App\Service;

interface PaymentProcessor
{
    public function pay($amount);
}