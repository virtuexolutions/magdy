<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CardVerificationRequest;
use Auth;
use App\Models\Order;
use App\Models\Orderdetail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($country_from = "",$country_to = "")
    {

        if($country_from == "" && $country_from == "")
        {
            return redirect()->back()->withErrors(["message"]);
        }
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

    try{
         $request->validate([
            'country_from' => ['required', 'max:4'],
            'country_to' => ['required', 'max:4'],
            'credit_number' => ['required', 'max:16'],
            'expiry' => ['required', 'max:6'],
            'cvc' => ['required', 'digits_between:1,300'],
            'country' => ['required','max:4']
        ]);
        $card = Auth::user()->Credit_Card()->create([
            "card" => $request->credit_number,
            "expire" => $request->expiry,
            "cvc" => $request->cvc,
            "country" => $request->country,
        ]);
        $order_master = Auth::user()->Orders()->create([
                "card_id" =>  $card->id,
                "country_from" =>  $request->country_from,
                "country_to" =>  $request->country_to,
                "status" => 0,
        ]);
        foreach(\Cart::getContent() as $item){
            $create_Array = [
                "order_id" =>  $order_master->id,
                'product_link' => $item->name,
                'product_description' =>  $item->attributes->pro_description,
                'product_quantity' => $item->quantity,
                'product_price' => $item->price,
                "product_weigth" => 0.00,
                "product_weigth_type" => 1,
            ];
            Orderdetail::create($create_Array);
            \Cart::clear();
        }
        return redirect("/buy_for_me")->with(["success" => "true" , "message" => "Order Has been Successfully Complete"]);
      }
      catch(\Exception $ex)
      { 
          return redirect()->back()->withErrors(["message" => $ex->getmessage()]);
      }
        
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
