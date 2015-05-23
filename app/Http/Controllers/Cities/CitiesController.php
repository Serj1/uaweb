<?php

namespace App\Http\Controllers\Cities;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use Illuminate\Http\Request;


class CitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $results = Cities::all();

        return view('admin.cities.list', ['cities' => $results]);
    }


    public function create()
    {
        return view('admin.cities.form');
    }

    public function edit($id)
    {
        $city = Cities::find($id);

        if (!$city) {
            exit('city not found');
        }

        return view('admin.cities.form', ['item' => $city]);
    }


    /**
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $brand = Cities::create([
            'title' => $request->input('title')
        ]);

        $brand->save();

        return redirect('admin/cities');
    }

    public function update(Request $request)
    {
        $brand = Cities::find($request->input('id'));

        $brand->title = $request->input('title');
        $brand->save();

        return redirect('admin/cities');
    }

    public function destroy($id)
    {
        $brand = Cities::find($id);
        $brand->delete();

        return redirect('admin/cities');
    }


}