<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->q) {
            $query->where('name', 'like', "%{$request->q}%")
                  ->orWhere('category', 'like', "%{$request->q}%");
        }

        // Filter status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $products = $query->latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'category' => 'nullable',
            'stock'    => 'required|integer|min:0',
            'price'    => 'required|numeric',
            'status'   => 'required'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'     => 'required',
            'category' => 'nullable',
            'stock'    => 'required|integer|min:0',
            'price'    => 'required|numeric',
            'status'   => 'required'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }
}
