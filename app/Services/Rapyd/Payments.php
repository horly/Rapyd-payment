<?php

namespace App\Services\Rapyd;

Class Payments
{
    public function getCountries()
    {
        $url = '/v1/data/countries';

        $response = Utilities::makeRequest('get', $url);

        return $response;
    }

    public function listPaymentMethodsByCountry()
    {
        $country = 'CA';
        $currency = 'CAD';
        $url = '/v1/payment_methods/country?country='. $country . '&currency=' . $currency;

        $response = Utilities::makeRequest('get', $url);

        return $response;
    }

    public function createCheckout($body)
    {
        $url = '/v1/checkout';
        $response = Utilities::makeRequest('post', $url, $body);

        return $response;
    }

    public function makePayment()
    {
        $body = [
            'amount' => 9.99,
            'currency' => 'USD',
            'payment_method' => [
                'type' => 'us_visa_card',
                'fields' => [
                    'number' => '4111111111111111',
                    'expiration_month' => '10',
                    'expiration_year' => '21',
                    'cvv' => '123']
            ],
            'error_payment_url' => urldecode('https://error_example.net'),
            'capture' => true
        ];

        $response = Utilities::makeRequest('post', '/v1/payments', $body);

        return $response;
    }
}
