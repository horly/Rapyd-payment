<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Services\Rapyd\Payments;

class HomeController extends Controller
{
    protected $payments;

    function __construct(Payments $payments)
    {
        $this->payments = $payments;
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

    function getCheckout()
    {

    }
}
