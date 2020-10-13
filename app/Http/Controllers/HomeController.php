<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_admin == 1){
            return redirect()->route("admin.route");
        }
        return view('home');
    }
    public function handleAdmin()
    {
        $new_orders = Order::where('order_done',0)->count();
        $new_orders_data = Order::where('order_done',0)->orwhere('order_done',1)->orwhere('order_done',2)->select()->orderBy('created_at', 'DESC')->get();
        $all_orders = Order::all()->count();
        $all_orders_done = Order::where('order_done',3)->select()->get();
        $total_sales = 0;
        foreach($all_orders_done as $order){
            $total_sales += ($order->total_price - $order->city);
        }
        $products = Product::all()->count();
        return view('Admin.dashboard',[
            'new_orders' => $new_orders,
            'all_orders' => $all_orders,
            'total_sales'=> $total_sales,
            'products' => $products,
            'new_orders_data'=> $new_orders_data
        ]);
    } 

   

}
