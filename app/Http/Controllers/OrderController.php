<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::select()->paginate(10);
        return view("Admin.manage_orders",[
            'orders'=>$orders
        ]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($products)
    {
        $products = explode(' ',$products);
        $orders = array();
        
        foreach($products as $prod){
            $single_product = Product::find($prod);
            $orders[$prod]=$single_product;
        }
        return view('Admin.order_view',[
            'orders'=>$orders
        ]);
    }

    public function accept(Request $request){
        Order::where('id',$request->id)->update([
            'order_done'=>1
        ]);
        $order = Order::find($request->id);
        return response()->json(['order_state'=>$order->order_done]);
    }
    
    public function decline(Request $request){
        Order::where('id',$request->id)->update([
            'order_done'=>-1
        ]);
        $order = Order::find($request->id);
        return response()->json(['order_state'=>$order->order_done]);
    }
    public function delivery_process(Request $request){
        Order::where('id',$request->id)->update([
            'order_done'=>2
        ]);
        $order = Order::find($request->id);
        return response()->json(['order_state'=>$order->order_done]);
    }
    
    public function received_order(Request $request){
        Order::where('id',$request->id)->update([
            'order_done'=>3
        ]);
        $order = Order::find($request->id);
        return response()->json(['order_state'=>$order->order_done]);
    }
    
    public function unreceived_order(Request $request){
        Order::where('id',$request->id)->update([
            'order_done'=>-2
        ]);
        $order = Order::find($request->id);
        return response()->json(['order_state'=>$order->order_done]);
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
