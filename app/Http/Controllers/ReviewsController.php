<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
class ReviewsController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request, Product $product)
    {
       auth()->user()->reviews()->create([
            'review' => $request->review,
            'product_id' => $product->id
       ]);  
       return redirect()->back(); 
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

   
    public function destroy($id)
    {
        //
    }
}
