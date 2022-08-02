<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Services\Rapyd\Payments;

class HomeController extends Controller
{

    protected $request;
    protected $payments;

    function __construct(Request $request, Payments $payments)
    {
        $this->payments = $payments;
        $this->request = $request;
    }

    function home()
    {
        //dd($this->payments->listPaymentMethodsByCountry());
        //dd($this->payments->getCountries());
        //dd($this->payments->createCheckout());
        //dd($this->payments->makePayment());

        $countries = $this->payments->getCountries(); //retourne un tableau

        return View('home.home', [
            'countries' => $countries['data']
        ]);
    }

    function about()
    {
        return view('home.about');
    }

    function getCheckout()
    {
        $fullName = $this->request->input('fullName');
        $country = $this->request->input('country');
        $currency = $this->request->input('currency');
        $amount = $this->request->input('amount');

        $url_complete_payment = "http://otindi.loc/about";
        //"https://www.otindi.com"

        $body = [
            "amount" => $amount,
            "complete_checkout_url" => $url_complete_payment,
            "country" => $country,
            "currency" => $currency,
            "requested_currency" => $currency,
            "merchant_reference_id" => "950ae8c6-76",
            "payment_method_types_include" => [
            ],
            "payment_method_type_categories" => [
            ]
        ];

        $response = $this->payments->createCheckout($body);

        dd($response);
        $data_payment = $response['data'];

        return redirect($data_payment['redirect_url']);
    }
}
