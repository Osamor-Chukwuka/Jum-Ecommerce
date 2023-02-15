<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ]);

        $form['email'] = auth()->user()->email;
        Seller::create($form);

        return redirect('/home')->with('status', 'You are now a seller on JUM');
    }
}
