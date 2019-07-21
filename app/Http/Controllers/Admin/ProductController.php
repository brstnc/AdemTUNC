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
    public function index($id = 0)
    {
        $list = Product::with('categories', 'categories.category')->orderbyDesc('id')->paginate(8);
        return view('admin.product.index', compact('list'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function create_post(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_img' => 'required',
            'content' => 'required',
        ]);
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->content = $request->content;
        $product->order = $request->order;


        $file = $request->product_img;
        $name = time() . '.jpg';
        $file->move('images/product/', $name);
        $adres = '/images/product' . '/' . $name;
        $product->product_img = $adres;

        $product->saveOrFail();

        if ($request->has('categories')) {
            foreach ($request->categories as $category) {
                $categoryy = new CategoryProduct();
                $categoryy->category_id = $category;
                $categoryy->product_id = $product->id;

                $categoryy->saveOrFail();
            }
        }


        if ($request->hasFile('product_imgs')) {
            for ($i = 0; $i < count($request->product_imgs); $i++) {
                $detail = new ProductDetail();
                $detail->product_id = $product->id;
                $file = $request->product_imgs[$i];
                $name = time() .$i. '.jpg';
                $file->move('images/product/photo/', $name);
                $adres = '/images/product/photo' . '/' . $name;
                $detail->product_img = $adres;

                $detail->saveOrFail();
            }
        }
        $product->saveOrFail();

        return redirect()->route('admin.product');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit', compact('product', 'categories'));

    }

    public function edit_post(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'content' => 'required',
        ]);
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->content = $request->content;
        $product->order = $request->order;

        if ($request->hasFile('product_img')) {
            $file = $request->product_img;
            $name = time() . '.jpg';
            $file->move('images/product/', $name);
            $adres = '/images/product' . '/' . $name;
            $product->product_img = $adres;

            $product->saveOrFail();
        }

        if ($request->has('categories')) {
            $categoriess = CategoryProduct::all()->where('product_id', $id);
            foreach ($categoriess as $category) {
                $category->delete();
            }

            foreach ($request->categories as $category) {
                $categoryy = new CategoryProduct;
                $categoryy->category_id = $category;
                $categoryy->product_id = $product->id;

                $categoryy->saveOrFail();
            }
        }


        if ($request->hasFile('product_imgs')) {
            $images = ProductDetail::all()->where('product_id', $product->id);
            foreach ($images as $image) {
                $image->delete();
            }
            for ($i = 0; $i < count($request->product_imgs); $i++) {
                $detail = new ProductDetail();
                $detail->product_id = $product->id;
                $file = $request->product_imgs[$i];
                $name = time() . $i.'.jpg';
                $file->move('images/product/photo/', $name);
                $adres = '/images/product/photo' . '/' . $name;
                $detail->product_img = $adres;

                $detail->saveOrFail();
            }
        }
        $product->saveOrFail();

        return redirect()->route('admin.product');

    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->detail()->delete();
        $product->delete();

        return redirect()->route('admin.product');
    }
}
