<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\UpCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories($id)
    {
        $list = UpCategory::with('sub_categories', 'sub_categories.sub_category')->where('id', $id)->get();
        return view('front.category', compact('list'));
    }
}
