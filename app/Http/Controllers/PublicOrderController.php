<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PublicOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $valid = $request->validate([
            'fname'=> 'required',
            'lname'=> 'required',
            'number'=> 'required',
            'city' => 'required',
            'address'=> 'required'
        ]);
        
        $products = "";
        $cart = session()->get('cart');
        $total =0;
        foreach($cart as $cart){
            $products = $products . $cart['id'] . ' ' ;
            $total += $cart['unit_price'];
        }
        $products = substr($products,0,strlen($products)-1);
        
        $total_price = $total + $request->input('city');
        
        $order = Order::create([
            'fname'=>$request->input('fname'),
            'lname'=>$request->input('lname'),
            'phone'=>$request->input('number'),
            'email'=>$request->input('email'),
            'city'=>$request->input('city'),
            'address'=>$request->input('address'),
            'notes'=>$request->input('notes'),
            'products'=>$products,
            'total_price'=>$total_price

        ]);
        session()->flush();
        return redirect()->route('orders.done');
    }

    public function orderDone(){
        session()->flush();
        echo "<script>setTimeout(function(){ window.location.href = '/'; }, 3000);</script>";
        return view("public_views.order_done");
       
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
