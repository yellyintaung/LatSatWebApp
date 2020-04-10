<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Type;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('la.product.index')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $type = Type::all();
        return view('la.product.create')->with('category',$category)
                                        ->with('type',$type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->type_id = $request->type_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->hot_item = $request->hot_item;
        if ($request->hasFile('product_img')) {
            $file = $request->product_img;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $product->product_img = $file->getClientOriginalName();
        } else {
            $product->product_img = null;
        }
        if($product->save()){
            return redirect('/admin/product');
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
        $product = Product::find($id);
        return view('la.product.show')->with('product',$product);
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
        $category = Category::all();
        $type = Type::all();
        return view('la.product.edit')->with('product', $product)
                                      ->with('type',$type)
                                      ->with('category',$category);
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
        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->type_id = $request->type_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->hot_item = $request->hot_item;
        if ($request->hasFile('product_img')) {
            $file = $request->product_img;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $product->product_img = $file->getClientOriginalName();
        } else {
            $product->product_img = $request->oldimage;
        }
        if($product->save()){
            return redirect('/admin/product');
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
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/product');
    }
}
