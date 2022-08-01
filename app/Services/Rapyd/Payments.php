<?php

namespace App\Services\Rapyd;

Class Payments
{
    public function listPaymentMethodsByCountry()
    {
        $country = 'US';
        $currency = 'USD';
        $url = '/v1/payment_methods/country?country='. $country . '&currency=' . $currency;

        $response = Utilities::makeRequest('get', $url);

        return $response;
    }
}
