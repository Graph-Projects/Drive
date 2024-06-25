<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return response()->json($products, 201);
    }

    public function create()
    {
        $categories = Category::all();
        return response()->json($categories, 201);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'stock' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        } else {
            $imagePath = null;
        }

        $product =Product::create($validatedData);

        return response()->json($validatedData, 201);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product, 201);

    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return response()->json($product, 201);
    }

    public function update(Request $request, String $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'stock' => 'required|integer',

            //'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
        $product->update($validatedData);
        return response()->json($validatedData, 201);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json($product, 201);
    }
}