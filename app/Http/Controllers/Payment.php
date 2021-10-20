<?php

namespace App\Http\Controllers;

use App\Course;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

// use Illuminate\Http\Request;

class Payment extends Controller
{

    public function auth(Request $request)

    {

        $user = User::findOrFail(auth('web')->user()->id);
        $address = $user->address;
        $mobile_number =$user->mobile_number;
        $name = $user->name;
        $email = $user->email;


        $course = Course::findOrFail($request->id);
        $course_id = $course->id;
        $price = 250; //$course->price
        $amount = $price * 100;

        session(['course_id' => $course_id]);


        if (auth('web')->check()){

            $response = Http::post('https://accept.paymobsolutions.com/api/auth/tokens', [
                'api_key' => 'ZXlKMGVYQWlPaUpLVjFRaUxDSmhiR2NpT2lKSVV6VXhNaUo5LmV5SnVZVzF
                sSWpvaWFXNXBkR2xoYkNJc0luQnliMlpwYkdWZmNHc2lPakV5TnpVeU1Dd2lZMnhoYzNNaU9p
                Sk5aWEpqYUdGdWRDSjkubjIzM0xGcS1nMV9WR1VEaHRsYkJTRE0wTUZQMkQyeTRMUHo2QVNyY
                kRRM3lFQXktMlZTVzhvRHpidXlsekFraS1IZDU4LXVZWjBvNWR5WmF3WFJtNFE=',
            ]);
        $data = json_decode($response);
        $token = $data->token;
        $merchant_id = $data->profile->id;

//*************************************************************************************************

        $order = Http::post('https://accept.paymobsolutions.com/api/ecommerce/orders',
            [
              "auth_token"=> $token, // auth token obtained from step1
              "delivery_needed"=> "false",
              "merchant_id"=> $merchant_id,      // merchant_id obtained from step 1
              "amount_cents"=> $amount,
              "currency"=> "ILS",
              "merchant_order_id"=> rand(0, 100000),  // unique alpha-numerice value, example: E6RR3
              "items"=> [],
        ]);
        $orderData = json_decode($order);
        $id = $orderData->id;


//*************************************************************************************************

        $pay_key_request = Http::post('https://accept.paymobsolutions.com/api/acceptance/payment_keys',
        [
              "auth_token" => $token, // auth token obtained from step1
              "amount_cents" => $amount,
              "expiration" => 3600,
              "order_id" => $id,    // id obtained in step 2
              "currency" => "ILS",
              "integration_id" => 1179210,  // card integration_id will be provided upon signing up,
              "billing_data" => [
                "city" => $address,
                "phone_number" => $mobile_number,
                "last_name"=> "-",
                "first_name"=> $name,
                "country"=> "PS",
                "building"=> "-",
                "floor"=> "-",
                "street"=> "-",
                "email"=> $email,
                "postal_code" => "00970",
                "apartment"=> "-",
                "state"=> "-",



                "extra_description"=> "NA"
              ],

        ]);
        $pay_key = json_decode($pay_key_request);
        $pay_token = $pay_key->token;

        //*************************************************************************************************

        $ifram = 'https://accept.paymobsolutions.com/api/acceptance/iframes/289317?payment_token='.$pay_token;

        return view('front.pay',compact('ifram'));

        }else{
            return redirect()->route('register');
        }


    }
    //**************************************************************************************************






public function jawwalAccept(Request $request){
    //        dd($request->txn_response_code);
            $isSuccess = $request->txn_response_code;
            if ($isSuccess == 200){

                $user = User::find(auth('web')->user()->id);
                $courses = $user->courses;
                $course_id = session('course_id');
                $course = Course::find($course_id);
                $registeredCourses = $user->courses;
                foreach ($registeredCourses as $registeredCourse){
                    if ($registeredCourse->id == $course_id){
                        return redirect()->back();
                    }
                }
                $user->courses()->attach($course);
                $user->courses()->updateExistingPivot($course, array('active' => 1), false);
                $order = new Order();
                $order->course_name = $course->name;
                $order->student_name = $user->name;
                $order->amount = $course->price;
                $order->address = $user->address;
                $order->type = 'online';
                $order->save();

                return view('front.payment-success')->with('course_id',$course_id);

            }else{
                return view('front.noMoney');

            }

        }



    }
