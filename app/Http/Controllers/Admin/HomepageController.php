<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\UpCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        $product_count = Product::all()->count();
        $up_category_count = UpCategory::all()->count();
        $sub_category_count = Category::all()->count();
        $user_count = User::all()->count();
        return view('admin.homepage', compact(
            'product_count',
            'up_category_count',
            'sub_category_count',
            'user_count'
        ));
    }
}
