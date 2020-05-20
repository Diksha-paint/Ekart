<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class CategoriesController extends Controller
{
    
    public function index()
    {
        return view('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }

   
    public function store(Request $request)
    {
        $image = $request->image->store('categories');
        Category::create([
            'name' => $request->name,
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->name , '-'),
            'image' => $image
            ]);
            

            return redirect()->route('categories.index');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
