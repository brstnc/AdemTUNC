<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($id=0)
    {

        $list = Product::orderbyDesc('id')->paginate(8);

        return view('admin.product.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new Product();
        $product_categories = [];
        if($id>0) {
            $entry = Product::find($id);
            $product_categories = $entry->categories()->pluck('category_id')->all();
        }
        $categories = Category::all();
        $up_categories = Category::all()->where('up_id', null);

        return view('admin.product.form', compact('entry', 'categories', 'product_categories',
            'up_categories'));
    }
    public function save($id = 0)
    {
        $this->validate(request(), [
            'product_name' => 'required',
        ]);


        $data = request()->only( 'product_name', 'comment');
        $data_detail = request()->only('show_slider', 'show_opportunity', 'show_featured',
            'show_bestselling', 'show_reduced') ;

        $categories = request('categories');

        if ($id>0) {
            $entry = Product::where('id', $id)->firstOrFail();
            $entry->update($data);
            $entry->detail()->update($data_detail);
            $entry->categories()->sync($categories);

        } else {
            $entry = Product::create($data);
            $entry->detail()->create($data_detail);
            $entry->categories()->attach($categories);
        }

        if (request()->hasFile('product_img')) {

            $this->validate(request(), [
                'product_img' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);

            $product_img = request()->product_img;

            $file_name = $entry->id . "-". time() . "." . $product_img->extension();


            if ($product_img->isValid()) {

                $product_img->move('uploads/products', $file_name);

                ProductDetail::updateOrCreate(
                    ['product_id' => $entry->id],
                    ['product_img' => $file_name]
                );
            }
        }

        return redirect()->route('admin.product.update', $entry->id);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function create_post(Request $request)
    {
        $request->validate ([
            'product_name' => 'required',
            'product_img' => 'required',
            'content' => 'required',
        ]);
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->content = $request->content;


        $file = $request->product_img;
        $name = time() . '.jpg';
        $file->move('images/product/', $name);
        $adres = '/images/product' . '/' . $name;
        $product->product_img = $adres;

        $product->saveOrFail();

        foreach ($request->categories as $category)
        {
            $categoryy = new CategoryProduct();
            $categoryy->category_id = $category;
            $categoryy->product_id = $product->id;

            $categoryy->saveOrFail();


        }


        if($request->hasFile('product_imgs'))
        {
            for ($i=0;$i<count($request->product_imgs);$i++)
            {
                $detail = new ProductDetail();
                $detail->product_id = $product->id;
                $file = $request->product_imgs[$i];
                $name = time() . '.jpg';
                $file->move('images/product/content/', $name);
                $adres = '/images/product/content' . '/' . $name;
                $detail->product_img = $adres;

                $detail->saveOrFail();
            }
        }
        $product->saveOrFail();

        return redirect()->route('admin.product');
    }

    public function edit($id)
    {



    }
    public function edit_post(Request $request, $id)
    {

    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->categories()->detach();
        $product->detail()->delete();
        $product->delete();

        return redirect()->route('admin.product');
    }
}
