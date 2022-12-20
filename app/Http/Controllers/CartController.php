<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request){
        $userid = Auth::user()->id;
        // $form =  $request->hid;
        $form = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        
        $form['users_id'] = $userid;
        Cart::create($form);

        return redirect('#')->with('status', 'Item Added to Cart');
        

    }

    public function getCart(){
        
    }
}
