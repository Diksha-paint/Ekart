<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class BlogControllers extends Controller
{
    public function index()
    {
        return view('welcome')
        ->with('products', Product::all());
        
    }

  
}
