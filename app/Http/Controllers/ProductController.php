<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    const PATH_IMG = '/var/www/html/public' . DIRECTORY_SEPARATOR . 'img';

    public function all()
    {
        $products = Product::all();
        return view('admin.products.all', ['products' => $products]);
    }

    public function one($id)
    {
        $product = Product::query()->find($id);
        return view('product', ['product' => $product]);
    }

    public function addView()
    {
        $categories = Categorie::all();
        return view('admin.products.add', ['categories' => $categories]);
    }

    public function add(Request $request)
    {

        $request->validate([
            'name' => 'required|String',
            'price' => 'required|numeric',
            'categories_id' => 'required|integer',
            'description' => 'required|String',
            'img1' => 'required|file|image'
        ]);

        $img = $request->file('img1');
        $nameImg = md5(time()) . '.' . $img->extension();

        $manager = new ImageManager();
        $manager->make($img->path())->resize(900, 900, function ($constraint) {
            $constraint->aspectRatio();
        })->save(self::PATH_IMG . DIRECTORY_SEPARATOR . $nameImg);

        $product = new Product([
            'name' => $request->name,
            'categories_id' => $request->categories_id,
            'price' => $request->price,
            'img1' => $nameImg,
            'description' => $request->description
        ]);
        $product->save();
        return redirect()->route('products.all');
    }

    public function edit($id)
    {
        $product = Product::query()->find($id);
        $categories = Categorie::all();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|String',
            'price' => 'required|numeric',
            'categories_id' => 'required|integer',
            'description' => 'required|String',
            'img1' => 'file|image',
            'id' => 'required|numeric'
        ]);

        $product = Product::query()->find($request->id);

        $product->name = $request->name;
        $product->categories_id = $request->categories_id;
        $product->price = $request->price;
        $product->description = $request->description;


        $img = $request->file('img1');
        if ($img) {
            $nameImg = md5(time()) . '.' . $img->extension();

            $manager = new ImageManager();
            $manager->make($img->path())->resize(900, 900, function ($constraint) {
                $constraint->aspectRatio();
            })->save(self::PATH_IMG . DIRECTORY_SEPARATOR . $nameImg);
            $product->img1 = $nameImg;
        }

        $product->save();
        return redirect()->route('products.all');
    }

    public function delete($id)
    {
        $product = Product::query()->find($id);
        $product->delete();
        return redirect()->route('products.all');
    }
}
