<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Brands;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $results = Products::all();

        return view('admin.products.list', ['products' => $results]);
    }


    public function create()
    {
        $root = Categories::root();
        $categories = $root->getDescendants();

        $brands = Brands::all();

        $return = [
            'categories' => $categories,
            'brands' => $brands
        ];

        return view('admin.products.form', $return);
    }

    public function edit($id)
    {
        $product = Products::find($id);

        if (!$product) {
            exit('user not found');
        }

        $root = Categories::root();
        $categories = $root->getDescendants();

        $brands = Brands::all();

        $return = [
            'categories' => $categories,
            'brands' => $brands,
            'item' => $product
        ];

        return view('admin.products.form', $return);
    }


    /**
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = Products::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);

        $user->save();

        return redirect('admin/products');
    }

    public function update(Request $request)
    {
        $product = Products::find($request->input('id'));

        $product->title = $request->input('title');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();

        return redirect('admin/products');
    }

    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();

        return redirect('admin/products');
    }


}