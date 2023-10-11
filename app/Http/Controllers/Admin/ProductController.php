<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\ProductPhotoTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use ProductPhotoTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(6);
       return view('products/allproduct',compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required','string'],
            'category_id' => ['required','integer'],
            'price'       => ['required','integer'],
            'description' => ['required','string'],
            'quantity'    => ['required','integer']
        ]);

        $path = $this->storeProductPhoto($request,'product_img');
        Product::create([
            'name'        => $request->name,
            'category_id' =>$request->category_id,
            'price'       => $request->price,
            'description' => $request->description,
            'photo'       =>$path,
            'quantity'    =>$request->quantity,

        ]);

        return redirect()->route('products.index')->with('sucsses','your posts has been added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show-product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit-product',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products.index')->with('message','your post has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('del','your post has been deleted successfully');
    }

    public function deletedproduct(){
        $products = Product::onlyTrashed()->get();
        return view('products/show-deleted',compact('products'));
    }
    public function forcedelete(string $id)
    {
        Product::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->with('del','your post has been deleted successfully');
    }
    public function restore(string $id)
    {
        Product::withTrashed()->where('id', $id)->restore();
        return redirect()->route('products.index')->with('restore','your post has been restored successfully');
    }





}
