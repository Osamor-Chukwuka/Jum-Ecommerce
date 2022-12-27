<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Routing\Route;
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
        $showCart =  Cart::where('users_id', auth()->user()->id)->get();
        $totalPrice = 0;
        $lencart = sizeof($showCart);
        foreach($showCart as $show){
            $totalPrice += str_replace(',', '', $show->price) ;

        }
        return view('cart', [
            'showCart' => $showCart,
            'totalPrice' => $totalPrice,
            'lencart' => $lencart
        ]);
    }

    public function delete(Request $request){
        Cart::destroy($request->id);
        
        return redirect(Route('cart'))->with('status', 'Item removed from Cart');
    }

    public function increaseQuantity(Request $request){
        $product = Cart::where('id', $request->id)->get();

        foreach($product as $prod){
            $quantity = $prod->quantity;
        }
        
        Cart::where('id', $request->id)->update(['quantity' => $quantity + 1]);

        return redirect(Route('cart'));
        
    }

    public function decreaseQuantity(Request $request){
        $product = Cart::where('id', $request->id)->get();

        foreach($product as $prod){
            $quantity = $prod->quantity;
        }

        if($quantity <=1){
            return redirect(Route('cart'));
        }

        else{
            Cart::where('id', $request->id)->update(['quantity' => $quantity - 1]);

            return redirect(Route('cart'));
        }
        
        
        
    }
}
