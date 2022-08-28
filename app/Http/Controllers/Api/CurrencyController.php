<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::all();

        return response()->json([
                'status' => 200,
                'currencies' => $currencies
            ], 201
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCurrencyRequest $request)
    {
        $currency = Currency::create($request->all());

        return response()->json(
           [
            'status' => 201,
            'message' => "La devise a été ajouté avec succès",
            'currency' => $currency
           ], 201
           );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return response()->json(
            [
             'status' => 200,
             'currency' => $currency
            ], 200
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(AddCurrencyRequest $request, Currency $currency)
    {
       $currency->update($request->all());
       return response()->json([
            'status' => 201,
            'message' => "La devise a été modifier avec succès",
            'currency' => $currency
       ], 201
       );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return response()->json([
            'status' => 201,
            'message' => "La devise a été supprimé avec succès"
       ], 201
       );
    }
}
