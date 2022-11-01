<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Product_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Product::paginate(20);
        return view('backend.products')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat= Category::where('status',1)->get();
        return view('backend.addproduct')->with('cat',$cat);
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
            'title' => 'required|max:50|min:2',
            'price' => 'required|numeric',
            'cat' => 'required',
            'description' => 'required|max:800',
            'files' => 'required',
    
        ]);
    
    
       if ($request->hasFile('files')) {
               
        $image = $request->file('files');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/product/');
        $image->move($destinationPath, $name);
        
    }
    
      
        $slug = str_replace(' ', '-', $request->title);
        $data=new Product;
        $data->title = $request->title;
        $data->slug =$slug;
        $data->stock = $request->stock;
        $data->price = $request->price;
        $data->cat_id = $request->cat;
        $data->des = $request->description;
        $data->files =  $name;
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
        $cat= Category::where('status',1)->get();
        $data = Product::find($id);
        return view('backend.productsedit')->with('data', $data)->with('cat',$cat);
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
        'title' => 'required|max:50|min:2',
        'price' => 'required|numeric',
        'cat' => 'required',
        'description' => 'required|max:800',
    ]);

    if ($request->hasFile('files')) {
           
        $image = $request->file('files');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/shop/grid/');
        $image->move($destinationPath, $name);

        $data= Product::find( $request->id);
        $data->files = $name;
        $data->save();
        
    }

    $slug = str_replace(' ', '-', $request->title);

    $data= Product::find( $id);
    $data->title = $request->title;
    $data->slug =  $slug;
    $data->price = $request->price;
    $data->cat_id = $request->cat;
    $data->des = $request->description;
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
        //
    }
}
