<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $Categories = Category::select()->paginate(10);
        return view("Admin.manage_category",[
            'categories'=>$Categories
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
        $dataV = $request->validate([
            'cat_name'=>'required'
        ]);

        if($request->hasFile('cat_image')){
            $fileImage = time() . '.' . $request->file('cat_image')->getClientOriginalName();
            $request->file('cat_image')->storeAs('public/Category_images',$fileImage);

            Category::create([
                'cat_name'=>$request->input('cat_name'),
                'cat_image'=>$fileImage
            ]);

            return redirect(url()->previous());
        }else{
            Category::create([
                'cat_name'=>$request->input('cat_name')
            ]);

            return redirect(url()->previous());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view("Admin.edit_category",[
            'category'=>$category
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

        $validate = $request->validate([
            'cat_name'=>'required'
        ]);

        if($request->hasFile('image')){
            $fileImage = time() . '.' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/Category_images',$fileImage);

            Category::where('id',$id)->update([
                'cat_name'=> $request->cat_name,
                'cat_image'=>$fileImage
            ]);
            return redirect(url()->previous());
        
        }else{
            Category::where('id',$id)->update([
                'cat_name'=> $request->cat_name
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
        Category::where('id',$id)->delete();
        return redirect(url()->previous());
    }
}
