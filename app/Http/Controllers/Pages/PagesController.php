<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $results = Page::all();

        return view('admin.pages.list', ['pages' => $results]);
    }

    public function create()
    {
        return view('admin.pages.form');
    }

    public function edit($id)
    {
        $page = Page::find($id);

        return view('admin.pages.form', ['item' => $page]);
    }


    /**
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $page = Page::create([
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);

        $page->save();

        return redirect('admin/pages');
    }

    public function update(Request $request)
    {
        $page = Page::find($request->input('id'));

        $page->title = $request->input('title');
        $page->body = $request->input('body');
        $page->save();

        return redirect('admin/pages');
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect('admin/pages');
    }


}