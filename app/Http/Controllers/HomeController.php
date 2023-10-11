<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(6);
        return view('home',compact('products','categories'));
    }
    public function show(Request $request)
    {
        $categories = Category::all();
        $productId = $request->input('id');
        $product = Product::find($productId);
        return view('showforuser',compact('product','categories'));
    }
    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            // $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "product_name" => $product->name,
                "photo" => $product->photo,
                "price" => $product->price,
                "quantity" => $product->quantity,

            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            session()->flash('success', 'Product successfully removed!');
        } else {
            session()->flash('error', 'Product not found in cart.');
        }

        return redirect()->route('cart');
    }


}
