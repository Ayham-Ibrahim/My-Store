<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories/all-category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories/create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:categories'],
        ]);

        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index')->with('sucsses','your category has been added successfuly');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories/edit-category',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')->with('message','your category has been updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('del','your category has been deleted successfully');
    }

    public function deletedcategory(){
        $categories = Category::onlyTrashed()->get();
        return view('categories/show-deleted',compact('categories'));
    }
    public function forcedelete(string $id)
    {
        Category::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->with('del','your category has been deleted successfully');
    }
    public function restore(string $id)
    {
        Category::withTrashed()->where('id', $id)->restore();
        return redirect()->route('categories.index')->with('restore','your category has been restored successfully');
    }

    public function category_products(Category $category){
        $products = $category->products;
        return view('categories/filtered-products',compact('products'));
    }

    public function get_category_products(Category $category){
        $id = $category->id;
        $products = $category->get_products($id);
        $categories = Category::all();
        return view('categories/category-filter',compact('products','categories'));
    }


}
