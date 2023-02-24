<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'Categories' => Categories::all()
        ]);
    }

    public function show(Request $request){
        $segment = $request->segment(3);
        $relationship =  Categories::find($segment)->prouducts;
        return view('products', [
            'relationship' => $relationship,
        ]);
    }
    //


    public function create(){
        if(auth()->user() == []){
            return view('sellerReg');
        }

        elseif ( auth()->user()->email == null){
            return view('sellerReg');
        }
        
        else if( DB::table('seller')->where('email', auth()->user()->email)->exists()){
            return view('add-product');
        }
        
        else{
            return view('sellerReg');
        }
        
    }

    public function store(Request $request){
        $form = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $form['categories_id'] = $request['category'];

        
        $seller = DB::table('seller')->where('email', Auth::user()->email)->pluck('id')->first();
        $form['seller_id'] = $seller;

        Products::create($form);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    public function fullPage(Request $request){
        $productDescId = $request->segment(3);
        $allProducts = Products::find($productDescId);

        return view('full-page', [
            'allProducts' => $allProducts
        ]);
    }

    public function cartProductPage(Request $request){
        $segment = $request->segment(3);
        $allProducts = Products::find($segment);

        return view('full-page', [
            'allProducts' => $allProducts
        ]);
    }
}
