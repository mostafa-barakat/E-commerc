<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\Card;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function stripe($totil_price)
    {
        return view('home.payment' , compact('totil_price'));
    }
    public function stripePost(Request $request , $totil_price)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totil_price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);


        $user = Auth::user();
        $userid = $user->id;
        $data = Card::where('user_id' , '=' , $userid)->get();
        foreach($data as $data){
            Order::create([
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'user_id' =>  $data->user_id,
                'product_title' =>  $data->product_title,
                'price' => $data->price,
                'quantity' => $data->quantity,
                'image' => $data->image,
                'product_id' => $data->product_id,
                'payment_stauts' => 'Paid',
            ]);
            $card_id = $data->id;
            $card = Card::find($card_id);
            $card->delete();
        }


        return redirect()->route('home.card')->with('mas' , 'The Order Done');



        Session::flash('success', 'Payment successful!');
        return back();
    }
}
