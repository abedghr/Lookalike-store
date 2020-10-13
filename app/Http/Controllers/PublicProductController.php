<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PublicProductController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single_product = Product::find($id);
        return view('public_views.single_product',[
            'product' => $single_product
        ]);
    }
    public function all(){
        $products = Product::select()->paginate(10);
        return view('public_views.all_products',[
            'products'=>$products
        ]);
    }
}
