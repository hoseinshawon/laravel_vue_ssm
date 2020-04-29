<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\Product as ProductResource;
Use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['products' => ProductResource::collection(Product::all()),
                                 'categories' => Category::pluck('name')->all()], 200);
    }


    public function store(Request $request)
    {
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'in_stock' => $request->in_stock,
            'active' => $request->active,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
        ]);
        
        return response()->json(['product' => $product], 200);
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
