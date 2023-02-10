<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Catagory;
use Illuminate\Http\Request;
use App\Http\Requests\productRequest;
// use Illuminate\Notifications\Notification;
// use Notification;
// use Illuminate\Support\Facades\Notification;
class AdminController extends Controller
{
    public function View_catagory()
    {
        $catagorys = Catagory::all();
        return view('admin.catagory' , compact('catagorys'));
    }
    public function add_catagory_data(Request $request)
    {

        if($request->name == null){
            return redirect()->back()->with('message' , 'EMPTY')->with('type' , 'warning');
        }
        Catagory::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('message' , 'add done')->with('type' , 'success');
    }

    public function destroy($id)
    {
        Catagory::destroy($id);
        Product::destroy($id);
        return redirect()->back();
    }

    public function add_product()
    {
        $catagorys = Catagory::all();
        return view('admin.add_product' , compact('catagorys'));
    }
    public function add_product_data(productRequest $request)
    {
        $path = $request->file('image')->store('uploads', 'custom');
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'quantity' => $request->quantity,
            'catagory' => $request->catagory,
            'image' => $path,
        ]);
        return redirect()->back()->with('message' , 'add done')->with('type' , 'success');
    }


    public function show_prodect()
    {
        $products = Product::all();
        // dd($products);
        return view('admin.show_product' , compact('products'));
    }

    public function trach()
    {
        $products = Product::onlyTrashed()->latest('id')->paginate(10);
        return view('admin.trach' , compact('products'));
    }
    public function restore($id)
    {
        Product::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.show_product');
    }
    public function forcdelete($id)
    {

        Product::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.show_product');
    }

    public function edit($id)
    {
        $catagorys = Catagory::findOrFail($id);
        $product = Product::findOrFail($id);

        return view('admin.edit' ,compact('product' , 'catagorys'));
    }

    public function show_order()
    {
        $orders = Order::all();
        return view('admin.order' , compact('orders'));
    }

    public function send_email($id)
    {

        $orderid = Order::find($id);
        return view('admin.email_info' , compact('orderid'));
    }

    public function send_user_email(Request $request , $id)
    {
        $orderid = Order::find($id);
        $details = [
            'greeting' => $request->greeting ,
            'firstling' =>  $request->firstling,
            'body' =>  $request->body,
            'button' =>  $request->button,
            'url' =>  $request->url,
            'lastling' =>  $request->lastling,
        ];
        // have problem dont no why
        // Notification::send($orderid , new SendEmailNotification($details));
        return redirect()->back();
    }

    public function search(Request $request)
    {

        $search = $request->search;
        $orders = Order::where('name' ,'like', '%' . $search . '%')->orWhere('email' ,'like', '%' . $search . '%')->orWhere('phone' ,'like', '%' . $search . '%')->get();
        return view('admin.order' , compact('orders'));
    }

    }
