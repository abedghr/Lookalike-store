<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Related;
use Illuminate\Http\Request;

class RelatedController extends Controller
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
    public function create()
    {
        $all_related = Related::select()->paginate(10);
        return view("Admin.manage_related",[
            'all_related' =>$all_related
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
        $valid = $request->validate([
            'name'=>'required|unique:related,name',
            'gender'=>'required'
        ]);

        Related::create([
            'name'=>$request->input('name'),
            'gender'=>$request->input('gender')
        ]);
        
        return redirect(url()->previous());
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
        $single_related = Related::find($id);
        return view('Admin.edit_related',[
            'related'=>$single_related
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
        $valid = $request->validate([
            'name'=>'required|unique:related,name',
            'gender'=>'required'
        ]);

        Related::where('id',$id)->update([
            'name'=>$request->input('name'),
            'gender'=>$request->input('gender')
        ]);
        
        return redirect(url()->previous());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Related::where('id',$id)->delete();

        return redirect(url()->previous());
    }
}
