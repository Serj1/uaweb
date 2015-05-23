<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $parent = Categories::root();

        $three = $parent->getDescendants();

        $products = Products::where('category_id', '=', $parent->id)->get();

        $return = [
            'three' => $three,
            'parent' => $parent,
            'products' => $products
        ];

        return view('admin.categories.list', $return);
    }

    public function view($id)
    {

        $parent = Categories::find($id);

        $three = $parent->getDescendants();

        $products = Products::where('category_id', '=', $id)->get();

        $return = [
            'three' => $three,
            'parent' => $parent,
            'products' => $products
        ];

        return view('admin.categories.list', $return);
    }


    public function create($id)
    {
        $parent = Categories::find($id);

        return view('admin.categories.form', ['parent' => $parent]);
    }

    public function edit($id)
    {
        $category = Categories::find($id);

        return view('admin.categories.form', ['item' => $category]);
    }

    public function store(Request $request)
    {

        $parent = Categories::find($request->input('parent_id'));

        $parent->children()->create(['title' => $request->input('title')]);


        return redirect('admin/categories');
    }

    public function update(Request $request)
    {
        $category = Categories::find($request->input('id'));
        $category->title = $request->input('title');
        $category->save();

        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();

        return redirect('admin/categories');
    }


}