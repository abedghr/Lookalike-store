<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

use function HighlightUtilities\splitCodeIntoArray;

class CartController extends Controller
{
    public function addtocart(Request $request){
        
        if($request->quantity !=0){
        $product = Product::findOrFail($request->input('product_id'));
        $cart = session()->has('cart') ? session()->get('cart') : [];
        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['quantity']+=$request->quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'title' => $product->prod_name,
                'quantity' => $request->quantity,
                'unit_price' => $product->prod_new_price,
                'image' => $product->prod_image
            ];
        }
        session(['cart' => $cart]);
        
        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $counter = count($data['cart']);
        session(['counter'=>$counter]);
        return response()->json(['data'=>$data,'counter'=>$counter]);
        }
    }
    

    public function shoppingcart(){
        $cart= session()->has('cart') ? session()->get('cart') : [];
        
        return view('public_views.cart',[
            'cart'=>$cart
        ]);
    }

    public function checkout(){
        $cities = City::all();
        if(session()->has('cart')){
            $cart = session()->get('cart');
            return view('public_views.checkout',[
                'cart'=>$cart,
                'cities'=>$cities
            ]);
        }else{
            return view('public_views.empty_cart');
        }
    }

    public function removeFromCart($id){
        $cart = session()->has('cart') ? session()->get('cart') : [];
        unset($cart[$id]);
        session(["cart"=>$cart]);
        $counter = count($cart);
        session(['counter'=>$counter]);
        return redirect(url()->previous());
    }

}

