<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Dotenv\Parser\Value;
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

    public function show(Request $request)
    {
        $segment = $request->segment(3);
        $relationship =  Categories::find($segment)->prouducts;
        return view('products', [
            'relationship' => $relationship,
        ]);
    }
    //


    public function create()
    {
        if (auth()->user() == []) {
            return view('sellerReg');
        } elseif (auth()->user()->email == null) {
            return view('sellerReg');
        } else if (DB::table('seller')->where('email', auth()->user()->email)->exists()) {
            $shop_name = DB::table('seller')->where('email', auth()->user()->email)->first(['shopName'])->shopName;

            return view('add-product', [
                'shopName' => $shop_name
            ]);
        } else {
            return view('sellerReg');
        }
    }

    public function store(Request $request)
    {
        $form = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'images' => 'required',
        ]);

        $image = [];
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $destination_path = 'public/images/houses';
                $image_name = $file->getClientOriginalName();
                $path = $file->storeAs($destination_path, $image_name);
                (array_push($image, $image_name));
            }
        }

        $form['images'] = implode('|', $image);
        $form['categories_id'] = $request['category'];


        $seller = DB::table('seller')->where('users_id', Auth::user()->id)->pluck('users_id')->first();
        $form['users_id'] = $seller;  //This users_id is a foreign key that reference the users_id in the seller table, and the seller table users_id is a foreign key that reference the id in the users table

        Products::create($form);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    public function fullPage(Request $request)
    {
        $productDescId = $request->segment(3);
        $allProducts = Products::find($productDescId);

        // var_dump($allProducts->images);

        return view('full-page', [
            'allProducts' => $allProducts
        ]);
    }

    public function cartProductPage(Request $request)
    {
        $segment = $request->segment(3);
        $allProducts = Products::find($segment);

        return view('full-page', [
            'allProducts' => $allProducts
        ]);
    }
}
