<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('category.create',[
            'categories' => $categories
        ]);
    }


    public function store(Request $request)
    {
        $category = new Category();
        $request->validate([
            'name'=>'required',
        ]);

        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')
            ->with('success','category added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'))  ;
    }
    /*
        public function update(Request $request, Product $product)
        {
            $request->validate([
                'name'=>'required',
                'price'=>'required',
                'detail'=>'required'
            ]);

            $product->update($request->all());
            return redirect()->route('products.index')
                ->with('success','product updated successflly') ;
        }
    */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success','category deleted successflly') ;
    }
}
