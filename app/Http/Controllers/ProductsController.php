<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($id)
    {
        $list = Category::with('products', 'products.product')->where('id', $id)->get();
        return view('front.products', compact('list'));
    }

    public function product($id)
    {
        $list = Product::with('detail')->where('id', $id)->first();
        return view('front.product', compact('list'));
    }
}
