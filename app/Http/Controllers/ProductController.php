<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('product.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',[
            'categories' => $categories
        ]);
    }


    public function store(Request $request)
    {
        $product = new Product();
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'category_id'=>'required',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('products.index')
            ->with('success','product added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', [
            'product' => $product,
            'categories' => $categories
        ])  ;
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'category_id'=>'required',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->category_id = $request->category_id;

        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('success','product updated successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success','product deleted successflly') ;
    }


}
