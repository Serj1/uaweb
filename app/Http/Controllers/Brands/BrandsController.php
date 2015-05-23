<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;


class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $results = Brands::all();

        return view('admin.brands.list', ['brands' => $results]);
    }


    public function create()
    {
        return view('admin.brands.form');
    }

    public function edit($id)
    {
        $brand = Brands::find($id);

        if (!$brand) {
            exit('user not found');
        }

        return view('admin.brands.form', ['item' => $brand]);
    }


    /**
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $brand = Brands::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'type' => $request->input('type')
        ]);

        $brand->save();

        return redirect('admin/brands');
    }

    public function update(Request $request)
    {
        $brand = Brands::find($request->input('id'));

        $brand->title = $request->input('title');
        $brand->description = $request->input('description');
        $brand->description = $request->input('type');
        $brand->save();

        return redirect('admin/brands');
    }

    public function destroy($id)
    {
        $brand = Brands::find($id);
        $brand->delete();

        return redirect('admin/brands');
    }


}