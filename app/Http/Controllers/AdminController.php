<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = User::where('is_admin',1)->select()->orderBy('id', 'desc')->paginate(5);
        return view("Admin.manage_admin",[
            'admins'=>$admins
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
        $data = $request->validate([
            'admin_name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        if($request->hasFile("image")){
            $fileImage = time() . '.' . $request->file("image")->getClientOriginalName();
            $request->file('image')->storeAs('public/Admin_images',$fileImage);
        
            User::create([
                'name'=> $request->input("admin_name"),
                'email'=> $request->input("email"),
                'password'=> Hash::make($request->input("password")),
                'is_admin'=> 1,
                'image'=>$fileImage
            ]);

            return redirect(url()->previous());
        }else{
            User::create([
                'name'=> $request->input("admin_name"),
                'email'=> $request->input("email"),
                'password'=> Hash::make($request->input("password")),
                'is_admin'=> 1
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
        $single_admin = User::findOrFail($id);
        return view("Admin.edit_admin",[
            "admin"=>$single_admin
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
        $data = $request->validate([
            'admin_name'=>'required',
            'email'=>'required'
        ]);
        
        if($request->hasFile("image")){
            
            if($request->password != null){
            $fileImage = time() . '.' . $request->file("image")->getClientOriginalName();
            $request->file('image')->storeAs('public/Admin_images',$fileImage);
        
            $updateUser = User::where('id',$id)->update([
            'name'=>$request->input('admin_name'),
            'email'=>$request->input('email'),
            'password'=> Hash::make($request->input('password')),
            'image'=>$fileImage
            ]);
            
            return redirect(url()->previous());
            }else{
                $fileImage = time() . '.' . $request->file("image")->getClientOriginalName();
                $request->file('image')->storeAs('public/Admin_images',$fileImage);
            
                $updateUser = User::where('id',$id)->update([
                'name'=>$request->input('admin_name'),
                'email'=>$request->input('email'),
                'image'=>$fileImage
                ]);
                
                return redirect(url()->previous());
            }
        }else{
            if($request->password !=null){
            $updateUser = User::where('id',$id)->update([
                'name'=>$request->input('admin_name'),
                'email'=>$request->input('email'),
                'password'=> Hash::make($request->input('password'))
            ]);
            return redirect(url()->previous());
            }else{
                $updateUser = User::where('id',$id)->update([
                    'name'=>$request->input('admin_name'),
                    'email'=>$request->input('email')
                ]);
                return redirect(url()->previous());
            }
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
        $del_admin = User::where('id',$id)->delete();
        return redirect(url()->previous());
    }
}
