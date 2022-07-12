<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderitem;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('custom views.proceed');
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
    public function store(Request $request)
    {

        $order = new order();
        $order -> fname = $request->input('fname');
        $order -> lname =  $request->input('lname');
        if(Auth::check())
        {
            $order->user_id = Auth::user()->id;
        }

        $order -> email = $request->input('email');
        $order -> phone =  $request->input('phone');
        $order -> address =  $request->input('add');
        $order -> country = $request->input('country');
        $order -> town = $request->input('city');
        $order -> subtotal = Cart::subtotal();
        $order -> total = Cart::total();
        $order->save();

        foreach(Cart::content() as $item){
            $orderitem = new orderitem();
            $orderitem->order_id = $order->id;
            $orderitem->product_name = $item -> name;
            $orderitem->qty = $item ->qty ;
            $orderitem->price = $item -> price;
            $orderitem->save();

        }
        Cart::destroy();
        return redirect()->route('thankyou');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
