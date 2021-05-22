<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{

    public function all(Request $request)
    {
        $request->validate([
            'page' => 'integer'
        ]);

        $limit = 6;
        $offset = 0;
        $page = --$request->page;
        if ($page) {
            $offset = $page * $limit;
        }

        $products = Product::query()->orderBy('id', 'desc')->limit($limit)->offset($offset)->get();
        $productsCount = Product::query()->orderBy('id', 'desc')->count();

        $pages = [];
        $countPage = ceil($productsCount / $limit);
        for ($i = 1; $i <= $countPage; $i++) {
            $pages[] = $i;
        }
        return view(Role::getRole().'.products.all', ['products' => $products, 'pages' => $pages, 'countPage' => $countPage]);
    }

    public function one(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $product = Product::query()->find($id);
            return view(Role::getRole() . '.products.product', ['product' => $product]);
        }
    }

    public function allFromCategorie(Request $request)
    {
        $request->validate([
            'id' => 'integer',
            'page' => 'integer'
        ]);

        $limit = 3;
        $offset = 0;
        $page = --$request->page;
        if ($page) {
            $offset = $page * $limit;
        }

        $categoriesId = $request->id;

        $products = Product::query()->where('categories_id', '=', $categoriesId)->orderBy('id', 'desc')->limit($limit)->offset($offset)->get();
        $productsCount = Product::query()->where('categories_id', '=', $categoriesId)->orderBy('id', 'desc')->count();

        $pages = [];
        $countPage = ceil($productsCount / $limit);
        for ($i = 1; $i <= $countPage; $i++) {
            $pages[] = $i;
        }
        $categorieName = Categorie::getName($categoriesId);
        return view(Role::getRole().'.products.allFromCatigorie', ['products' => $products, 'pages' => $pages, 'countPage' => $countPage, 'categorieName' => $categorieName]);
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
        })->save(Product::getPathDirImg() . DIRECTORY_SEPARATOR . $nameImg);

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
            })->save(Product::getPathDirImg() . DIRECTORY_SEPARATOR . $nameImg);
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
