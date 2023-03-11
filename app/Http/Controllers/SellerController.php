<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class SellerController extends Controller
{
    public function add(Request $request){
        $form = $request->validate([
            'shopName' => 'required',
            'accountManager' => 'required',
            'phoneNumber' => 'required',
            'phoneNumberTwo' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'bank' => 'required',
            'accountNumber' => 'required',
            'sortCode' => 'required',
            'accountName' => 'required'
        ]);

        $form['email'] = auth()->user()->email;
        $form['users_id'] = auth()->user()->id;
        Seller::create($form);

        return redirect('/home')->with('status', 'You are now a seller on JUM');
    }

    public function myShop(){
        $shop_products = [];
        if(auth()->user() == []){
            return view('sellerReg');
        }

        elseif ( auth()->user()->email == null){
            return view('sellerReg');
        }

        else if( Seller::where('email', auth()->user()->email)->exists()){

            if(url()->current() == route('my_shop') || url()->current() == route('shop_products')){
                $shop_products = Products::where('users_id', auth()->user()->id)->get();   //The user_id here references the foreign key user_id in seller table, and the user_id in seller table references the id in the users table
                echo $shop_products;
                return view('my-shop', [
                    'shop_Products' => $shop_products
                ])->fragment('product');
            }
            elseif(url()->current() == route('shop_orders')){
                return view('my-shop', [
                    'shop_Products' => $shop_products
                ])->fragment('orders');
            }else{
                return view('my-shop', [
                    'shop_Products' => $shop_products
                ])->fragment('delivered');
            }
        }
        else{
            return view('sellerReg');
        }
    }
}
