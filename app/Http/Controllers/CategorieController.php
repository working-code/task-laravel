<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Role;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function all()
    {
        $role = Role::getRole();
        return view("$role.categories.all", ['categories' => Categorie::all()]);
    }

    public function addView()
    {
        return view('admin.categories.add');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|String'
        ]);
        $categorie = new Categorie(['name' => $request->name]);
        $categorie->save();
        return redirect()->route('categories.all');
    }

    public function edit($id)
    {
        $categorie = Categorie::query()->find($id);
        return view('admin.categories.edit', ['categorie' => $categorie]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|String'
        ]);
        $categorie = Categorie::query()->find($request->id);
        $categorie->name = $request->name;
        $categorie->save();
        return redirect()->route('categories.all');
    }

    public function delete($id)
    {
        $categorie = Categorie::query()->find($id);
        $categorie->delete();
        return redirect()->route('categories.all');
    }
}
