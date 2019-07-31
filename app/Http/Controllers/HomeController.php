<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\UpCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $up_categories = UpCategory::all();
        return view('front.homepage', compact('up_categories'));
    }

    public function categories($id)
    {
        $categories = UpCategory::with('sub_categories', 'sub_categories.sub_categories')->where('id', $id)->get();
        return view('front.category', compact('categories'));
    }
}
