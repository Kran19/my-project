<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();  // Fetch all products from the database
        return view('admin.products.index', compact('products')); // Return the view and pass the products
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');  // Return the 'create' view
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product')); // Return the product detail view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        // Redirect after deleting
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }



    public function attributes()
    {
        return view('admin.products.attributes');  // Return the 'attributes' view
    }



    public function specifications()
    {
        return view('admin.products.specifications');  // Return the 'specifications' view
    }


    public function tags()
    {
        return view('admin.products.tags');  // Return the 'tags' view
    }
}
