<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Packages;
use App\Models\Subscription;
use App\Models\User;

class PaymentController extends Controller
{
    public function initiatePayment($package_id)
    {
        try {

            $merchant_name = config('surjopay.merchant_name');
            $merchant_password = config('surjopay.merchant_password');
            $merchant_prefix = config('surjopay.merchant_prefix');
            $get_token_url = config('surjopay.get_token_url');

            $data = [
                'username' => $merchant_name,
                'password' => $merchant_password,
            ];


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $get_token_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
            ]);


            $response = curl_exec($ch);
            $error = curl_error($ch);
            curl_close($ch);

            $responseObject = json_decode($response, true);

            if ($error) {
                echo 'cURL Error: ' . $error;
            } else {
                $response_data = json_decode($response, true);
                if (isset($response_data['token'])) {
                    // echo 'Token: ' . $response_data['token'];
                    $res = $this->createPayment($responseObject, $package_id);
                    if (isset($res['checkout_url']) && $res['checkout_url'] != null) {
                        return redirect()->away($res['checkout_url']);
                        //For Inertia Js, Use this to avoid whole tab opening as modal
                        return inertia()->location($res['checkout_url']);
                    }else{

                        // return redirect()->route('home')->with('error','Payment Generation Failed');
                        print_r('Payment Generation Failed');
                    }

                } else {
                    echo 'Token Generation Failed: ' . $response;
                }
            }

        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

    protected function createPayment($response, $package_id)
    {
        // getting package price and details
        session()->put('package_id', $package_id);
        $package = Packages::find($package_id);
        $price = $package->price;

        // getting user data-> phone, email
        $phone = auth()->user()->phone;
        $email = auth()->user()->email;
        if($email != null){
            $email = $email;
        }else{
            $email = 'noemail@gmail.com';
        }


        try {

            $token = $response['token'];
            $store_id   = $response['store_id'];
            $authorizationToken = "Bearer $token";
            $order_id = rand(000000000000,999999999999);

            session()->put('token', $token);

            // ____________________ store order details
            // session()->put('order_id', $order_id);

            $curl = curl_init();

            $secretpay_url = config('surjopay.secretpay_url');
            $merchant_prefix = config('surjopay.merchant_prefix');

            curl_setopt_array($curl, array(
                CURLOPT_URL => $secretpay_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "prefix": "'.$merchant_prefix.'",
                "token": "'.$token.'",
                "return_url": "'.route('payment.success').'",
                "cancel_url": "'.route('payment.cancel').'",
                "store_id": "'.$store_id.'",
                "amount": "'.$price.'",
                "order_id": "'.$order_id.'",
                "currency": "BDT",
                "customer_name": "Name, Not Provided",
                "customer_address": "Address, Not Provided",
                "customer_phone": "'.$phone.'",
                "customer_city": "City, Not provided",
                "customer_post_code": "none",
                "client_ip": "102.101.1.1",
                "discount_amount": "0",
                "disc_percent": "",
                "customer_email": "'.$email.'",
                "customer_state": "Bangladesh",
                "customer_postcode": "7200",
                "customer_country": "Bangladesh",
                "shipping_address": "Jhenaidah, Khulna, Bangladesh",
                "shipping_city": "Jhenaidah",
                "shipping_country": "Bangladesh",
                "received_person_name": "Reciver Name",
                "shipping_phone_number": "01700000000",
                "value1": "test value1",
                "value2": "",
                "value3": "",
                "value4": "",
                "type": "json"
            }',
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: $authorizationToken",
                ),
            ));

            $res = curl_exec($curl);

            curl_close($curl);
            $resObject = json_decode($res, true);

            return $resObject;

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function success(Request $request)
    {
        try {
            if (isset($request['order_id']) && $request['order_id'] != null) {

                $verific_url = config('surjopay.verific_url');

                $token = session()->get('token');
                $order_id = $request['order_id'];
                $authorizationToken = "Bearer $token";

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $verific_url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{
                        "order_id": "'.$order_id.'",
                        "type": "json"
                    }',
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: application/json",
                        "Authorization: $authorizationToken",
                    ),
                ));

                $res = curl_exec($curl);

                // if (curl_errno($curl)) {
                //     // Log cURL error
                //     $error_msg = curl_error($curl);
                //     dd("cURL Error: " . $error_msg);
                // }

                curl_close($curl);

                $resObject = json_decode($res, true);
                

                if($resObject[0]['sp_message']=="Success"){
                            session()->forget('token');
                            // dd($resObject[0]);
                            // __________________________________________________ STORING USER ORDER DATA INTO TABLE AFTER COMPLETING ORDER START
                            // $order_id = session()->get('order_id');

                            // _______________________Genereting a default or random password to store and mail
                            // ALREADY LOGGED IN
                            // sending confirmation sms
                            // $smsController = new SmsController();
                            // $smsSent = $smsController->sendSms($phone, $book_title);

                            $packageId = session('package_id');
                            $user_id = auth()->user()->id;
                            session()->put('user_id', $user_id);            

                            $add_order= new Subscription();
                            $add_order->user_id= $user_id;
                            $add_order->package_id= $packageId;
                            $add_order->price= $resObject[0]['amount'];
                            $add_order->orderId= $resObject[0]['order_id'];
                            $add_order->trxnId= $resObject[0]['bank_trx_id'];
                            $add_order->method= $resObject[0]['method'];
                            $add_order->pay_status= $resObject[0]['sp_message'];
                            $add_order->status= 'enabled';


                            $add_order->save();
                            return view('Frontend.Pages.layouts.successPage');

                            // __________ sending order info to customer mail
                            // return redirect()->route('mailsend', [
                            //     'order_id' => $order_id,
                            //     'book_title' => $book_title,
                            //     'price' => $price,
                            //     'email' => $email,
                            // ]);




                }else{

                    return view('Frontend.Pages.layouts.cancelPage');

                    // GO TO THE FAILED PAGE
                    session()->forget('token');

                }

                // if (!$resObject) {
                //     dd("Invalid JSON response: ", $res); // Log raw response
                // }

            }
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }


    public function successPay($order_id, $book_id, $book_title, $price, $email )
    {

          // __________________
    }

    public function cancel()
    {
        return view('Frontend.Pages.layouts.cancelPage');
    }

}
