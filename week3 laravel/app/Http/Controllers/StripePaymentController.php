<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;


class StripePaymentController extends Controller
{
    public function stripe()

    {
//dd('hello');
        return view('stripe');

    }
    public function stripePost(Request $request)

    {
//        dd($request);/''
//        $t=session()->get('total',$request['total']);


        Stripe\Stripe::setApiKey('pk_test_51HcrbsBPNQUWz9mxrvypQ6NdBlxJEudiNVYhZWaUrjIXDWtxyUxDVTGVwqZUjgNiPwC2UySEWxaHF4UbjG8G6Xlq00Eteeo21p');

        Stripe\Charge::create ([

            "amount" => 100,

            "currency" => "in",

            "source" => $request->stripeToken,

            "description" => "Test payment from itsolutionstuff.com."

        ]);



     session()->flash('success', 'Payment successful!');



        return back();

    }
}
