<?php

namespace App\Http\Controllers\Langs;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;


class LangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $results = Lang::all();

        return view('admin.lang.list', ['langs' => $results]);
    }


    public function create()
    {
        return view('admin.lang.form');
    }

    public function edit($id)
    {
        $lang = Lang::find($id);

        if (!$lang) {
            abort(404);
        }

        return view('admin.lang.form', ['item' => $lang]);
    }


    /**
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $brand = Lang::create([
            'lang' => $request->input('lang'),
            'default' => ($request->input('default') == 'on') ? 1 : 0
        ]);

        $brand->save();

        return redirect('admin/langs');
    }

    public function update(Request $request)
    {
        $lang = Lang::find($request->input('id'));

        $lang->lang = $request->input('lang');
        $lang->default = ($request->input('default') == 'on') ? 1 : 0;
        $lang->save();

        return redirect('admin/langs');
    }

    public function destroy($id)
    {
        $brand = Lang::find($id);
        $brand->delete();

        return redirect('admin/langs');
    }


}