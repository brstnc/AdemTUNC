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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $up_categories = UpCategory::orderByDesc('order')->get();
        return view('front.homepage', compact('up_categories'));
    }


}
