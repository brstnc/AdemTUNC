<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        // $list = DB::table('category AS C')
        //    ->select(['C.id', 'C.category_name', 'C.slug', 'category.category_name AS cname', 'C.created_at'])
        //    ->join('category', 'category.id', '=', 'C.up_id')
        //   ->orderbyDesc('C.id')
        //    ->paginate(8);

        $list = Category::with('up_category')->orderbyDesc('id')->paginate(8);

        return view('admin.category.index', compact('list'));
    }

    public function create()
    {

        $up_categories = Category::all()->where('up_id', null);
        return view('admin.category.create', compact('up_categories'));

    }
    public function create_post(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_img' => 'image'
        ]);

        $data = new Category();
        $data->category_name = $request->category_name;
        $data->up_id = $request->up_id;

        $file = $request->category_img;
        $name = time() . '.jpg';
        $file->move('img/category/', $name);
        $adres = '/img/category' . '/' . $name;
        $data->category_img = $adres;

        $data->saveOrFail();

        return redirect()->route('admin.category.index');

    }
    public function edit($id)
    {

        $up_categories = Category::all()->where('up_id', null);
        $category = Category::find($id);

        return view('admin.category.edit', compact('up_categories', 'category'));

    }
    public function edit_post(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $data = new Category();
        $data->category_name = $request->category_name;
        $data->up_id = $request->up_id;

        if ($request->hasFile('category_img')) {
            $file = $request->category_img;
            $name = time() . '.jpg';
            $file->move('img/category/', $name);
            $adres = 'img/category/' . '/' . $name;
            $data->category_img = $adres;
        }

        $data->saveOrFail();

        return redirect()->route('admin.category.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category');
    }
}
