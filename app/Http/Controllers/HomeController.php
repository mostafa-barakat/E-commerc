<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::paginate(3);
        return view('home.userpage' , compact('products'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){

            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_customer = User::all()->count();
            $order = Order::all();
                $total_revenue = 0 ;
            foreach($order as $order){
                $total_revenue = $total_revenue +  $order->price ;
            }

            return view('admin.home' , compact('total_product' , 'total_order' , 'total_customer' , 'total_revenue'));
        }
        else{
            $products = Product::paginate(3);
            return view('home.userpage' , compact('products'));
        }
    }

    public function product_details($id)
    {
        $product = Product::findOrFail($id);
        return view('home.product_details' , compact('product'));
    }

    public function add_product(Request $request , $id)
    {
        if(Auth::id()){

            $user = Auth::user();
            $product = Product::findOrFail($id);
            if($product->discount_price != null){
                $price = $product->discount_price;
            }
            else{
                $price = $product->price;
            }
            Card::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'product_title' => $product->title,
                'price' => $price * $request->quantity,
                'quantity' => $request->quantity,
                'image' => $product->image,
                'product_id' => $product->id,
                'user_id' => $user->id,
            ]);

            Alert::success('Product Add Successfully ', 'We Have Added Product To The Card');
            return redirect()->back();
        }
        else{
            return redirect('login');
        }

    }


    public function product_search(Request $request)
        {
            $search_text = $request->search;
            $products = Product::where('title' ,'like', '%' . $search_text . '%')->orWhere('description' ,'like', '%' . $search_text . '%')->orWhere('catagory' ,'like', '%' . $search_text . '%')->paginate(3);
            return view('home.userpage' , compact('products'));
        }

    public function card()
    {
        if(Auth::id()){
            $id = Auth::user()->id;
            $cards = Card::latest('id')->where('user_id' , '=' , $id)->get();
            return view('home.card' , compact('cards'));
        }
        else{
            return redirect('login');
        }
    }

    public function destroy($id)
    {
        Card::destroy($id);
        Order::destroy($id);
        Comment::destroy($id);
        return redirect()->back();
    }

    public function order()
    {
        if(Auth::id()){
            $id = Auth::user()->id;
            $orders = Order::latest('id')->where('user_id' , '=' , $id)->get();
            return view('home.order' , compact('orders'));
        }
        else{
            return redirect('login');
        }
    }

    public function all_comments()
    {
        $comments = Comment::all();
        return view('home.comments' , compact('comments'));
    }

    public function add_comment(Request $request)
    {
        if(Auth::id()){
            Comment::create([
                'name' => Auth::user()->name,
                'content' => $request->comments,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }





}
