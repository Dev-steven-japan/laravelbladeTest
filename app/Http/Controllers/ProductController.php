<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a listing of products
    public function index()
    {
        $products = Product::with('user')->get(); // Retrieve all products with their associated users
        return view('products.index', compact('products')); // Pass products to the view
    }

    // Show the form for creating a new product
    public function create()
    {
        $users = \App\Models\User::all(); // Fetch all users
        return view('products.create', compact('users'));
    }

    // Store a newly created product in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'user_id' => 'required|exists:users,id', // Ensure the user exists
        ]);

        Product::create($request->all()); // Create the product
        return redirect()->route('products.index'); // Redirect to the products list
    }

    // Display a specific product
    public function show(Product $product)
    {
        $users = \App\Models\User::all(); // Fetch all users
        return view('products.show', compact('product', 'users'));
    }

    // Show the form for editing a product
    public function edit(Product $product)
    {
        $users = \App\Models\User::all(); // Fetch all users
        return view('products.edit', compact('product', 'users'));
    }

    // Update a product in the database
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    // Delete a product from the database
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    // Custom method to like a product
    public function like(Product $product)
    {
        $product->liked = true;
        $product->save();

        return redirect()->route('products.index');
    }
}
