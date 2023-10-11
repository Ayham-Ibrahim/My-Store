<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function store(Request $request){
        $request->validate([
            'products_ids'    =>['array'],
            'products_ids.*'  =>['integer','exists:products,id'],
            'quantity'        =>['array'],
            'quantity.*'      =>['integer']
        ]);

        $products_ids = $request->products_ids;
        $quantity = $request->quantity;

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->total_price = 0;
        $order->save();

        $total_price = 0;
        for ($i=0; $i < count($products_ids); $i++) {
            $product = Product::find($products_ids[$i]);
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->product_id = $products_ids[$i];
            $order_item->quantity =  $quantity[$i];
            $order_item->price_per_item = $product->price;
            $order_item->price = $product->price * $quantity[$i];
            $order_item->save();

            $total_price = $total_price + $order_item->price;

        }
        $order->total_price = $total_price;
        $order->save();

        return redirect()->route('cart')->with('success', 'your order has been send to the owner');

    }
    public function allorders(){

        $orders = Order::all();
        return view('orders/all-orders',compact('orders'));
    }

    public function user_orders(User $user){

        $orders = $user->orders;
        return view('users/user-orders',compact('orders'));
    }

    // change order's status
    public function accept_orders(Order $order){

        if ($order->status != 'pending')
            return redirect()->back();

        $order->status = 'accepted';
        $order->save();
        return redirect()->back();
    }
    public function reject_orders(Order $order){
        if ($order->status != 'pending') {
            return redirect()->back();
        }
        $order->status = 'rejected';
        $order->save();
        return redirect()->back();
    }
    // change order's status

    public function filter_orders(User $user,Request $request){
        $status = $request->input('status');
        $orders = $user->get_orders($status);
        return view('users/filtered-orders',compact('orders'));
    }

    public function show_order_items(Order $order){
        $order_items= $order->order_items;
        return $order_items;
    }

    public function delete_order(string $id){

        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('del','the order has been deleted successfully');
    }


    public function accepted_orders(User $user){

        $orders = Order::where('status','accepted')->get();
        return view('orders/accepted-orders',compact('orders'));
    }
    public function pending_orders(User $user){

        $orders = Order::where('status','pending')->get();
        return view('orders/pending-orders',compact('orders'));
    }
    public function rejected_orders(User $user){

        $orders = Order::where('status','rejected')->get();
        return view('orders/rejected-orders',compact('orders'));
    }


}
