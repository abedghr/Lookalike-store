<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Related;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $all_related = Related::all();
        $products = Product::select()->orderBy('id', 'desc')->paginate(10);
        return view("Admin.manage_products",[
            'products'=>$products,
            'categories'=>$categories,
            'all_related'=>$all_related
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'prod_name'=>'required',
            'prod_description'=>'required',
            'prod_new_price'=>'required',
            'cat'=>'required'
        ]);

        if($request->hasFile('prod_image')){
            $fileImage = $request->file('prod_image')->getClientOriginalName();
            $request->file('prod_image')->storeAs("public/Product_images",$fileImage);
            Product::create([
                'prod_name'=>$request->input('prod_name'),
                'prod_description'=>$request->input('prod_description'),
                'prod_old_price'=>$request->input('prod_old_price'),
                'prod_new_price'=>$request->input('prod_new_price'),
                'cat_id'=>$request->input('cat'),
                'prod_status'=>$request->input('prod_status'),
                'country_made'=>$request->input('country_made'),
                'prod_related'=>$request->input('prod_related'),
                'prod_image'=>$fileImage
            ]);

            return redirect(url()->previous());
        }else{
            Product::create([
                'prod_name'=>$request->input('prod_name'),
                'prod_description'=>$request->input('prod_description'),
                'prod_old_price'=>$request->input('prod_old_price'),
                'prod_new_price'=>$request->input('prod_new_price'),
                'cat_id'=>$request->input('cat'),
                'prod_status'=>$request->input('prod_status'),
                'country_made'=>$request->input('country_made'),
                'prod_related'=>$request->input('prod_related')
            ]);

            return redirect(url()->previous());
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $all_related = Related::all();
        $categories = Category::all();
        return view('Admin.edit_product',[
            'product'=>$product,
            'categories'=>$categories,
            'all_related'=>$all_related
        ]);
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
        $val = $request->validate([
            'prod_name'=>'required',
            'prod_description'=>'required',
            'prod_new_price'=>'required'
        ]);

        if($request->hasFile('prod_image')){
            $fileImage = $request->file('prod_image')->getClientOriginalName();
            $request->file('prod_image')->storeAs("public/Product_images",$fileImage);
            Product::where('id',$id)->update([
                'prod_name'=>$request->input('prod_name'),
                'prod_description'=>$request->input('prod_description'),
                'prod_old_price'=>$request->input('prod_old_price'),
                'prod_new_price'=>$request->input('prod_new_price'),
                'cat_id'=>$request->input('cat'),
                'prod_status'=>$request->input('prod_status'),
                'country_made'=>$request->input('country_made'),
                'prod_related'=>$request->input('prod_related'),
                'availability'=>$request->input('prod_available'),
                'prod_image'=>$fileImage
            ]);

            return redirect(url()->previous());
        }else{
            Product::where('id',$id)->update([
                'prod_name'=>$request->input('prod_name'),
                'prod_description'=>$request->input('prod_description'),
                'prod_old_price'=>$request->input('prod_old_price'),
                'prod_new_price'=>$request->input('prod_new_price'),
                'cat_id'=>$request->input('cat'),
                'prod_status'=>$request->input('prod_status'),
                'country_made'=>$request->input('country_made'),
                'prod_related'=>$request->input('prod_related'),
                'availability'=>$request->input('prod_available')
            ]);

            return redirect(url()->previous());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();

        return redirect(url()->previous());
    }

}
