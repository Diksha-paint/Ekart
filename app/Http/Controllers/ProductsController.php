<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ValidateAddProduct;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
  
    public function index()
    {
        return view('products.index')->with('products', Product::all());
    }

    
    public function create()
    {
        return view('products.create');
    }


    public function store(ValidateAddProduct $request)
    {
        $image = $request->image->store('products');
        Product::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
                'image' => $image,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category
        ]);
        return redirect()->route('products.index');
    }

    
    public function show(Product $product)
    {
        return view('blog')->with('product', $product); 
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function cart()
    {
       //
    }

    
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
