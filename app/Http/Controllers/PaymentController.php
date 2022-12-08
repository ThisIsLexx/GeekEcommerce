<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $payments = Payment::where('user_id', Auth::id())->get();

        return view('payment.payment-index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('payment.payment-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255|min:2',
            'card_number' => 'required|numeric|digits:16',
            'expiration_date1' => 'required|string',
            'expiration_date2' => 'required|string',
            'cvv' => 'required|numeric|digits:3',
        ]);

        $expiration_date = $request->expiration_date1.'/'.$request->expiration_date2;
        $request->merge(['user_id' => Auth::id()]);
        $request->merge(['expiration_date' => $expiration_date]);
        Payment::create($request->except('__token','__Method','expiration_date1','expiration_date2'));
        
        return redirect("/payment")->with('success','Metodo de pago agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
        $ex1 = $payment->expiration_date[0].$payment->expiration_date[1];
        $ex2 = $payment->expiration_date[3].$payment->expiration_date[4];

        return view('payment.payment-edit', compact('payment', 'ex1', 'ex2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
        $request->validate([
            'name' => 'required|max:255|min:2',
            'card_number' => 'required|numeric|digits:16',
            'expiration_date1' => 'required|string',
            'expiration_date2' => 'required|string',
            'cvv' => 'required|numeric|digits:3',
        ]);

        $expiration_date = $request->expiration_date1.'/'.$request->expiration_date2;
        
        $payment->name = $request->name;
        $payment->card_number = $request->card_number;
        $payment->expiration_date = $expiration_date;
        $payment->cvv = $request->cvv;
        $payment->save();

        return redirect('/payment')->with('success','Método de pago editado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
        $payment->destroy($payment->id);
        return redirect('/payment')->with('success', 'Método de pago eliminado correctamente!');
    }
}
