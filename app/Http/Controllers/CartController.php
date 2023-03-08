<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use GuzzleHttp\Psr7\Message;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $userid = Auth::user()->id;
        // $form =  $request->hid;
        $form = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'product_id' => 'required'
        ]);

        $form['users_id'] = $userid;
        Cart::create($form);

        return redirect('#')->with('status', 'Item Added to Cart');
    }

    public function getCart()
    {
        $showCart =  Cart::where('users_id', auth()->user()->id)->get();
        $totalPrice = 0;
        $lencart = sizeof($showCart);
        foreach ($showCart as $show) {
            $totalPrice += (str_replace(',', '', $show->price)) * $show->quantity;
        }
        return view('cart', [
            'showCart' => $showCart,
            'totalPrice' => $totalPrice,
            'lencart' => $lencart
        ]);
    }

    public function delete(Request $request)
    {
        Cart::destroy($request->id);

        return redirect(Route('cart'))->with('status', 'Item removed from Cart');
    }

    public function increaseQuantity(Request $request)
    {
        $product = Cart::where('id', $request->id)->get();

        foreach ($product as $prod) {
            $quantity = $prod->quantity;
        }

        Cart::where('id', $request->id)->update(['quantity' => $quantity + 1]);

        return redirect(Route('cart'));
    }

    public function decreaseQuantity(Request $request)
    {
        $product = Cart::where('id', $request->id)->get();

        foreach ($product as $prod) {
            $quantity = $prod->quantity;
        }

        if ($quantity <= 1) {
            return redirect(Route('cart'));
        } else {
            Cart::where('id', $request->id)->update(['quantity' => $quantity - 1]);

            return redirect(Route('cart'));
        }
    }

    public function cartProductPage(Request $request)
    {
        $segment = $request->segment(3);
        return redirect(Route('description', [$segment]));
    }

    public function checkout()
    {
        return view('checkout');
    }



    public function verifySellerAccount()
    {
        $account_number = 6173644787;
        $sort_codeee = '070';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=$account_number&bank_code=$sort_codeee",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_ccc6e9fd27af032f21df6afa0c1e9a809a47da24",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // check if account name == name provided by the seller
            // echo $response;
            return $this->generateRecipentCode('osamor chukwuka chukwunoye', $account_number, $sort_codeee);
        }
    }


    public function generateRecipentCode($name, $account_number, $bank_code)
    {
        $url = "https://api.paystack.co/transferrecipient";

        $fields = [
            'type' => "nuban",
            'name' => $name,
            'account_number' => $account_number,
            'bank_code' => $bank_code,
            'currency' => "NGN"
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_test_ccc6e9fd27af032f21df6afa0c1e9a809a47da24",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        $result = json_decode($result);
        $recipient_code =  $result->data->recipient_code;
        echo $recipient_code;
    }




    public function verify($reference)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_ccc6e9fd27af032f21df6afa0c1e9a809a47da24",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $response = json_decode($response);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $this->verifySellerAccount();


            // return view('verify', [
            //     'response' => $response
            // ]);
        }
    }
}
