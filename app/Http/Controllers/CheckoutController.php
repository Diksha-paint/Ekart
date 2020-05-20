<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use Stripe;
use Mail;
use App\Mail\OrderDetails;
class CheckoutController extends Controller
{
    
    public function index()
    {
        return view('checkout')->with('items', Cart::getContent());
    }

    public function thanks(){
        return view('thanks'); 
    }

    
    public function store(Request $request)
    {
        $charge = Stripe::charges()->create([
            'amount'=> Cart::getTotal(),
            'currency' => 'INR',
            'source' => $request->stripeToken,
            'description' => 'Order'
        ]);
        $emailId = auth()->user()->email; 
        Mail::to($emailId)->send(new OrderDetails);
        Cart::clear();
        return redirect()->route('thanks');
    }

}
