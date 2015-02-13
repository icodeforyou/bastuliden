<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\StorePaymentPost;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller {

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePaymentPost $request
     * @param Payment $payment
     * @return Response
     */
    public function store(StorePaymentPost $request, Payment $payment)
    {
        $payment->create([
            "user_id" => $request->input("id"),
            "amount" => $request->input("amount")
        ]);

        return redirect("/users/" . $request->input("id"));
    }

}
