<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('add_product');
    }
    public function show(Product $product)
    {
        return view('view_product', ['product' => $product]);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
    public function index()
    {
    $products = Product::all();
    return view('products.index', compact('products'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|in:fruit,meat',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle the image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    // Create the product
    Product::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
        'type' => $request->type,
        'price' => $request->price,
        'image' => $imagePath, // Save the image path
    ]);

    return redirect()->route('products.create')->with('success', 'Product added successfully!');
}
}
