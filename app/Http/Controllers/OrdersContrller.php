<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\InvalidBankDetails;
use stdClass;

class OrdersContrller extends Controller
{
    //
    
    public function checkout()
    {
        $all_sellers_details = [];
        $all_sellers_details = $this->vendorsRecipient($all_sellers_details) ;
        var_dump($all_sellers_details) ;
        // return view('checkout', [
        //     'all_sellers_details' => $all_sellers_details
        // ]);
    }


    public function createOrder()
    {
        $cart = Cart::select('*')->where('users_id', auth()->user()->id)->get();
        $product_id = $cart[0]->product_id;
        $product = Products::select('*')->where('id', $product_id)->get();


        $category_id =  $cart[0]->category_id;
        $users_id =  $cart[0]->users_id;
        $cart_name =  $cart[0]->name;
        $cart_price =  $cart[0]->price;
        $cart_description =  $cart[0]->description;
        $cart_quantity =  $cart[0]->quantity;
        $sellers_id = $product[0]->users_id;
        $form = [
            'category_id' => $category_id,
            'product_id' => $product_id,
            'users_id' => $users_id,
            'sellers_id' => $sellers_id,
            'cart_name' => $cart_name,
            'cart_price' => $cart_price,
            'cart_description' => $cart_description,
            'cart_quantity' => $cart_quantity
            // 'accountNumber' => 'required',
        ];
        Orders::create($form);
    }



    public function calculateVendorMoney()
    {
        // Get all orders for the current transaction
        $order_cart = Cart::select('*')->where('users_id', auth()->user()->id)->get();
        // $orders = Orders::select('*')->where('users_id', 1)->get();


        // Group orders by vendor ID
        $ordersByVendor = $order_cart->groupBy('sellers_id');

        // Calculate total amount owed to each vendor
        $amountsOwed = collect();
        foreach ($ordersByVendor as $vendorId => $vendorOrders) {
            // $totalAmount = 2;
            $quantity = $vendorOrders->sum('quantity');
            $totalAmount = $vendorOrders->sum('price');
            $totalAmount = $quantity * $totalAmount;
            $amountsOwed->put($vendorId, $totalAmount);
        }

        return $amountsOwed; //$amountsOwed;

    }

    public function vendorsRecipient($all_sellers_details)
    {
        $vendors_id_amount =  $this->calculateVendorMoney();
        $seller_details = [];

        // Loop through the associative array
        foreach ($vendors_id_amount as $key => $value) {
            // echo "Key: " . $key . ", Value: " . $value . "\n";
            $seller_details[] = Seller::select('bank', 'accountNumber', 'sortCode', 'accountName', 'id')->where('id', $key)->get();
        }

        
        // Loop over the array to access each collection
        foreach ($seller_details as $collection) {
            // Loop over each collection to access each individual array
            foreach ($collection as $item) {
                // Do something with each individual array
                $account_no = $item->accountNumber;
                $sort_code = $item->sortCode;
                $account_name = $item->accountName;
                $email = $item->email;
                $id = $item->id;
                
                return $this->verifySellerAccount($account_no, $sort_code, $account_name, $email, $id, $all_sellers_details);
                // ...
            }
        }
    }


    public function verifySellerAccount($account_no, $sort_code, $account_name, $email, $id, $all_sellers_details)
    {
        // $account_name = 'osamor chukwuka chukwunoye';
        // $sort_code = '070';
        // echo $account_no, $bank, $sort_code. ' ';

        $account_number = $account_no;
        $sort_codeee = $sort_code;
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
            // dd($account_name);
            return $this->generateRecipentCode($account_name, $account_number, $sort_codeee, $email, $id, $all_sellers_details);
        }
    }




    public function generateRecipentCode($name, $account_number, $bank_code, $email, $id, $all_sellers_details)
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

        // execute post
        // $result = curl_exec($ch);
        // $result = json_decode($result);
        // $recipient_code =  $result->data->recipient_code;
        // echo $recipient_code;

        $result = curl_exec($ch);
        $data = json_decode($result, true);
        $status = $data['status'];
        if ($status) {
            $recepient = $data['data']['recipient_code'];
            $all_sellers_details[$recepient] =  $id;
            return $all_sellers_details;
        } else {
            // Cart::where('sellers_id', $id)->where('id', auth()->user()->id)->delete();
            return 'no';
        }
        
        // var_dump($status) ;


    }




    public function verifyCustomerPayment($reference)
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
            // $this->createOrder();
            // return $this->verifySellerAccount();


            // return view('verify', [
            //     'response' => $response
            // ]);
        }
    }


    public function transferMoney($recepient, $amount)
    {
        $url = "https://api.paystack.co/transfer";

        $fields = [
            'source' => "balance",
            'amount' => 37800,
            "reference" => "your-unique-reference",
            'recipient' => "RCP_t0ya41mp35flk40",
            'reason' => "Holiday Flexing"
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer SECRET_KEY",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        echo $result;
    }
}
