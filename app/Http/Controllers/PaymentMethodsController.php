<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethods;
use App\Http\Requests\StorePaymentMethodsRequest;
use App\Http\Requests\UpdatePaymentMethodsRequest;
use Illuminate\Support\Facades\Redirect;

class PaymentMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = PaymentMethods::all();
        return view('paymentMethods.index', [
            'paymentMethods' => $paymentMethods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paymentMethods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentMethodsRequest $request)
    {
        $data = $request->all();
        PaymentMethods::create($data);
        return Redirect::route('paymentMethods.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethods $paymentMethods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethods $paymentMethods)
    {
        return view('paymentMethods.edit', [
            'paymentMethods' => $paymentMethods
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentMethodsRequest $request, PaymentMethods $paymentMethods)
    {
        $data = $request->all();
        $paymentMethods->update($data);
        return Redirect::route('paymentMethods.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethods $paymentMethods)
    {
        $paymentMethods->delete();
        return Redirect::route('paymentMethods.index');
    }
}
