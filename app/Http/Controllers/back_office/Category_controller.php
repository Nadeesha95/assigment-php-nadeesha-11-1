<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class Category_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Category::get();
        return view('backend.categories')->with('data',$data);
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
       
        $request->validate([
            'cat_name' => 'required|max:50|unique:categories',
    
    
        ]);
    
        $data=new Category();
        $data->cat_name = $request->cat_name;
    
        $data->save();
        session()->flash('alert-success', 'Successfully Add!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Category::find($id);
        if($data->status==1){
            $data->status =0;
        }else{
    
            $data->status =1; 
        }
       
        $data->save();
        session()->flash('alert-success', 'Successfully!');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);
        $data= Category::paginate(20);
        return view('backend.categoryedit')->with('data', $data)->with('cat', $cat);
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
        $request->validate([
            'cat_name' => 'required|max:50',
    
    
        ]);
    
        $data= Category::find($id);
        $data->cat_name = $request->cat_name;
    
        $data->save();
        session()->flash('alert-success', 'Successfully Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}
