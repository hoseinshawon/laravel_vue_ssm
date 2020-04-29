<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\Product as ProductResource;
Use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        //return response()->json(['products' => Product::all()], 200);
        return response()->json(['products' => ProductResource::collection(Product::all()),
                                 'categories' => Category::pluck('name')->all()], 200);
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category_id,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
        ]);
        
        return response()->json(['product' => $product], 200);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->save();
        
        return response()->json(['product' => $product], 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return response()->json(['product' => $product], 200);
    }
}
