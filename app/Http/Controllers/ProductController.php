<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        
        // Pass the products data to the view
        return view('welcome', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);

        // Create a new product instance and save to the database
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'cost' => $request->cost,
            'quantity' => $request->quantity
        ]);

        // Redirect back with success message
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate request data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'cost' => 'required|numeric',
        'quantity' => 'required|integer'
    ]);

    // Find the product by ID
    $product = Product::findOrFail($id);

    // Update product details
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'cost' => $request->cost,
        'quantity' => $request->quantity
    ]);

    // Redirect back with success message
    return redirect()->route('welcome')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect back to the product list with a success message
        return redirect()->route('welcome')->with('success', 'Product deleted successfully!');
    }
}
