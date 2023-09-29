<?php

namespace App\Http\Controllers;

use App\Models\CarShop;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::get();
        if(!$request->ajax()) return view("product");
        return response()->json($products, 200);
    }

    public function productCar(Request $request)
    {
        $user = Auth::User();
        $product_id = $request->input('product_id');
        CarShop::create([
            'product_id' => $product_id,
            'user_id' => $user->id,
        ]);
        return view('/carshop');
    }

    public function getProduct(Request $request, $id)
    {
        if(!$request->ajax()) return view("product", compact('id'));
        $product = Product::find($id);
        return response()->json($product, 200);
    }

}
