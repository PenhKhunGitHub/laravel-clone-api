<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products['products'] = Product::orderBy('id','DESC')->get();
        return view('setup_product/product_conten',$products);
    }
    public function createProduct(Request $request){
        $request->validate(
        [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);
        $product = new Product([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);
        $product->save();
        return response()->json(
            [
                'message' => "Product Has been created successfully."
            ],200);
    }
    public function updateProduct(){

    }
    public function deleteProduct(){
    }
}
