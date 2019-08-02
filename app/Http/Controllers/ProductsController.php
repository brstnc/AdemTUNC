<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($id)
    {
        $list = Category::with('products', 'products.product')->where('id', $id)->get();
        return view('front.products', compact('list'));
    }
}
