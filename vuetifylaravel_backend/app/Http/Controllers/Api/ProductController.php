<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\Product as ProductResource;

use App\Category;
use App\Http\Resources\Category as CategoryResource;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(['products' => ProductResource::collection(Product::all()),
                                 'categories' => CategoryResource::collection(Category::all())], 200);
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'in_stock' => $request->in_stock,
            'active' => $request->active,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
        ]);
        
        return response()->json(['product' => $product], 200);
    }




    
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'in_stock' => $request->in_stock,
            'active' => $request->active,
            'price' => $request->price,
            'sale_price' => $request->sale_price
        ]);


        return response()->json(['product' => $product], 200);

        //return $request->all();
    }






    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();

        return response()->json(['product' => $product], 200);
    }
}
