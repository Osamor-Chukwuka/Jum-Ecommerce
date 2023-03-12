<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\InvalidBankDetails;
use App\Models\User;
use stdClass;

class OrdersContrller extends Controller
{
    //

    public function checkout()
    {
        $check =  Cart::select('users_id', 'price')->where('users_id', auth()->user()->id)->get();
        $sum_amount = 0;
        foreach ($check as $c) {
            $price = intval($c->price);
            $sum_amount += $price;
        }

        $user = User::select('email', 'name')->where('id', auth()->user()->id)->get();
        $user_name = $user[0]->name;
        $user_email = $user[0]->email;
        return view('checkout', [
            "sum_amount" => $sum_amount,
            "user_name" => $user_name,
            "user_email" => $user_email
        ]);
    }

    public function payVendors()
    {
        $this->vendorsRecipient();
        return redirect('/')->with('message', 'Listing created successfully!');
    }


    public function createOrder($status, $idd)
    {
        $cart = Cart::select('*')->where('users_id', auth()->user()->id)->where('sellers_id', $idd)->get();
        $product_id = $cart[0]->product_id;
        $product = Products::select('*')->where('id', $product_id)->get();


        echo $category_id =  $cart[0]->category_id;
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
            'cart_quantity' => $cart_quantity,
            'status' => $status
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

    public function vendorsRecipient()
    {
        $vendors_id_amount =  $this->calculateVendorMoney();
        $seller_details = collect();

        // Loop through the associative array
        foreach ($vendors_id_amount as $key => $value) {
            "Key: " . $key . ", Value: " . $value . "\n";
            $seller_details[] = Seller::select('bank', 'users_id', 'email', 'accountNumber', 'sortCode', 'accountName', 'id')->where('users_id', $key)->get();
        }


        // Loop over the array to access each collection
        foreach ($seller_details as $collection => $value2) {
            preg_match_all('/\[[^\]]+\]/', $collection . $value2, $matches);
            $lists = $matches[0];

            $lists = array_map(function ($list) {
                return json_decode($list, true);
            }, $lists);
            // Loop over each collection to access each individual array
            foreach ($lists as $item) {
                foreach ($item as $it) {
                    // Do something with each individual array
                    $account_no = $it['accountNumber'];
                    $sort_code = $it['sortCode'];
                    $account_name = $it['accountName'];
                    $email = $it['email'];
                    $id = $it['users_id'];







                    // $account_name = 'osamor chukwuka chukwunoye';
                    // $sort_code = '070';
                    // echo $account_no, $bank, $sort_code . ' ';
                    // echo $this->vendorsRecipient(2);
                    // $account_number = $account_no;
                    // $sort_codeee = $sort_code;
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=$account_no&bank_code=$sort_code",
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
                        // echo($account_no);

                        // return $this->generateRecipentCode($account_name, $account_number, $sort_codeee, $email, $id, $all_sellers_details);




                        $url = "https://api.paystack.co/transferrecipient";

                        $fields = [
                            'type' => "nuban",
                            'name' => $account_name,
                            'account_number' => $account_no,
                            'bank_code' => $sort_code,
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
                            $product_details =  Cart::select('price', 'quantity', 'name')->where('sellers_id', $id)->get();
                            $money = $product_details[0]->price;
                            $money = intval($money);
                            $product_quantity = $product_details[0]->quantity;
                            $product_name = $product_details[0]->name;
                            $random_string = 0;
                            for ($i = 1; $i <= 14; $i++) {
                                $random_string = $random_string . random_int(0, 500);
                            }


                            // TRANSFER MONEY
                            $url = "https://api.paystack.co/transfer";

                            $fields = [
                                'source' => "balance",
                                'amount' => $money,
                                "reference" => $random_string,
                                'recipient' => $recepient,
                                'reason' => $product_quantity . " " . $product_name
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
                            
                            if ($result) {
                                $cart = Cart::select('*')->where('users_id', auth()->user()->id)->where('sellers_id', $id)->get();
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
                                    'cart_quantity' => $cart_quantity,
                                    'status' => 'true'
                                    // 'accountNumber' => 'required',
                                ];
                                Orders::create($form);
                            } else {
                                return $this->createOrder($status, $id);
                            }
                        } else {
                            $cart = Cart::select('*')->where('users_id', auth()->user()->id)->where('sellers_id', $id)->get();
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
                                'cart_quantity' => $cart_quantity,
                                'status' => 'false'
                                // 'accountNumber' => 'required',
                            ];
                            Orders::create($form);
                        }


                        // var_dump($status) ;
                    }
                }


                // ...
            }
        }
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
            return redirect(route('pay-vendors'));
        }
    }


    public function transferMoney($recepient, $amount)
    {
    }
}
