<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\Category;
use App\Models\UpCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $list = Category::with('up_categories', 'up_categories.up_category')->orderbyDesc('order')->paginate(8);
        return view('admin.category.index', compact('list'));
    }

    public function create()
    {
        $categories = UpCategory::all();
        return view('admin.category.create', compact('categories'));
    }

    public function create_post(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_img'=> 'required',
            'order'=> 'required'
        ]);
        $data = new Category();
        $data->category_name = $request->category_name;
        $data->order = $request->order;

        $file = $request->category_img;
        $name = time() . '.jpg';
        $file->move('images/category/', $name);
        $adres = '/images/category' . '/' . $name;
        $data->category_img = $adres;

        $data->save();

        if ($request->has('categories')) {
            foreach ($request->categories as $category) {
                $categoryy = new Categories();
                $categoryy->up_category_id = $category;
                $categoryy->sub_category_id = $data->id;
                $categoryy->saveOrFail();
            }
        }

        return redirect()->route('admin.category');

    }

    public function edit($id)
    {

        $categories = UpCategory::all();
        $category = Category::find($id);

        return view('admin.category.edit', compact('categories', 'category'));

    }
    public function edit_post(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $data = Category::find($id);
        $data->category_name = $request->category_name;
        $data->order = $request->order;

        if ($request->hasFile('category_img')) {
            $file = $request->category_img;
            $name = time() . '.jpg';
            $file->move('images/category/', $name);
            $adres = '/images/category' . '/' . $name;
            $data->category_img = $adres;
        }

        $data->saveOrFail();

        if ($request->has('categories')) {
            $categories = Categories::all()->where('sub_category_id', $data->id);
            foreach ($categories as $categoryyy)
            {
                $categoryyy->delete();
            }
            foreach ($request->categories as $category) {
                $categoryy = new Categories;
                $categoryy->up_category_id = $category;
                $categoryy->sub_category_id = $data->id;
                $categoryy->saveOrFail();
            }
        }

        return redirect()->route('admin.category');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category');
    }
}
