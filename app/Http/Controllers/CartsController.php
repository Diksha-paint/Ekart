<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Http\Request;
use App\Product;

class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'index', 'update', 'destroy']);
    }
    
    public function index()
    {
        return view('cart')->with('items', Cart::getContent());
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        // product image
        // product name
        //product size
        //product price
        //product quantity
       Cart::add([ 
        'id' =>  $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'image' => $product->image,
        'quantity' => $request->quantity,
        'attributes' => [
            'size' => $request->size
        ]
       ])->associate($product);

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


    public function up($id, $quantity){
        $product = Product::find($id);
        $quantity = $quantity+1;
        Cart::update($id,[
            'quantity' => [
                'relative' => false,
                'value' => $quantity
            ],
        ]);
        return redirect()->back();
    }

    public function down($id, $quantity){
        $product = Product::find($id);
        $quantity = $quantity-1;
        Cart::update($id,[
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity
                ],
        ]);
        return redirect()->back();

    }
    
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

   

}



