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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:fruit,meat',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        return redirect()->route('products.create')->with('success', 'Product added successfully!');
    }
}
