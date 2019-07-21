<?php

namespace App\Http\Controllers\Admin;

use App\Models\UpCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpCategoryController extends Controller
{
    public function index()
    {
        // $list = DB::table('category AS C')
        //    ->select(['C.id', 'C.category_name', 'C.slug', 'category.category_name AS cname', 'C.created_at'])
        //    ->join('category', 'category.id', '=', 'C.up_id')
        //   ->orderbyDesc('C.id')
        //    ->paginate(8);

        $list = UpCategory::orderBy('id', 'desc')->get();

        return view('admin.upcategory.index', compact('list'));
    }

    public function create()
    {
        return view('admin.upcategory.create');
    }

    public function create_post(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_img'=> 'required'

        ]);
        $data = new UpCategory();
        $data->category_name = $request->category_name;
        $data->order = $request->order;

        $file = $request->category_img;
        $name = time() . '.jpg';
        $file->move('images/category/', $name);
        $adres = '/images/category' . '/' . $name;
        $data->category_img = $adres;

        $data->save();

        return redirect()->route('admin.upcategory');

    }

    public function edit($id)
    {
        $category = UpCategory::find($id);
        return view('admin.upcategory.edit', compact('category'));

    }
    public function edit_post(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $data = UpCategory::find($id);
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

        return redirect()->route('admin.upcategory');
    }

    public function delete($id)
    {
        $category = UpCategory::find($id);
        $category->delete();
        return redirect()->route('admin.upcategory');
    }
}
