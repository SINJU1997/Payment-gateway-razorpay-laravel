<?php

namespace App\Http\Controllers;

use Session;
use Razorpay\Api\Api;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success(){
        return view("success");
    }

    // key id : rzp_test_Q93LhRP0E4s5Ta
    // secret key : xOOK4v5zjNaGJkzO5p5dBo1z

    public function payment(Request $request){
        $name = $request->input('name');
        $amount = $request->input('amount');
        
        // Creates order
        $api = new Api('rzp_test_Q93LhRP0E4s5Ta', 'xOOK4v5zjNaGJkzO5p5dBo1z');
        $order  = $api->order->create(array('receipt' => '123', 'amount' => $amount * 100 , 'currency' => 'INR')); 
        $orderId = $order['id']; 

        $user_pay = new Payment();
    
        $user_pay->name = $name;
        $user_pay->amount = $amount;
        $user_pay->payment_id = $orderId;
        $user_pay->save();

        Session::put('order_id', $orderId);
        Session::put('name' , $name);
        Session::put('amount' , $amount);

        return redirect('/');
    }


    public function pay(Request $request){
        $data = $request->all();
        $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        $user->payment_done = true;
        $user->razorpay_id = $data['razorpay_order_id'];
        $user->save();
        return view('/success');
        
    }
}
