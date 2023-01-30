<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CardVerificationRequest;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($country_from,$country_to)
    {
        //
        $data["country_from"] = $country_from;
        $data["country_to"] = $country_to;
        return view("shopper.checkout.index",$data);
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
    public function store(request $request)
    {
        //
    //    / $validatedData = $request->validated();
         $request->validate([
            'country_from' => ['required', 'url', 'max:500'],
            'country_to' => ['required', 'url', 'max:500'],
            'credit-number' => ['required', 'url', 'max:500'],
            'expiry' => ['required', 'string', 'max:300'],
            'cvc' => ['required', 'digits_between:1,99999999999999'],
            'country' => ['required', 'digits_between:1,10']
        ]);
        dd($request->all());
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
