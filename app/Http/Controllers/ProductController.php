<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productFromCategory(Request $request)
    {
        // return product for category
        $category_id =$request->get('id');
        $products=  Product::where(['category_id'=> $category_id , 'accept'=>1] )->with(['images','user','category','city'])->latest()->paginate(10);
        return response( )->json([
            'status'=>'success',
            'data'=> ProductResource::collection($products)
        ]);
    }

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
