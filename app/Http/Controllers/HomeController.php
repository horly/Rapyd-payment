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
        dd($this->payments->listPaymentMethodsByCountry());

        return View('home.home');
    }
}
