<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

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

    public function create(){
        return view('add-product');
    }

    public function store(Request $request){
        $form = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $form['categories_id'] = $request['category'];

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
