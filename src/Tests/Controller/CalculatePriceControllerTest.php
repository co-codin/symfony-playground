<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatePriceControllerTest extends WebTestCase
{
    public function testCalculatePrice()
    {
        $client = static::createClient();
        $request = new Request();
        $request->setMethod('POST');
        $request->setContent('{"product": 1, "taxNumber": "DE123456789", "couponCode": "D15"}');
        $request->headers->set('Content-Type', 'application/json');
        $client->request($request);
        $response = $client->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }
}

class PurchaseControllerTest extends WebTestCase
{
    public function testPurchase()
    {
        $client = static::createClient();
        $request = new Request();
        $request->setMethod('POST');
        $request->setContent('{"product": 1, "taxNumber": "IT12345678900", "couponCode": "D15", "paymentProcessor": "paypal"}');
        $request->headers->set('Content-Type', 'application/json');
        $client->request($request);
        $response = $client->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }
}