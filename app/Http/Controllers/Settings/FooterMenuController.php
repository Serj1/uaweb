<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Page;
use App\Models\Products;
use App\Models\Brands;
use App\Models\SettingsFooterMenu;
use Illuminate\Http\Request;


class FooterMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = SettingsFooterMenu::all();

        return view('admin.settings.footer.list', ['menu' => $menu]);
    }


    public function create()
    {
        $pages = Page::all();

        return view('admin.settings.footer.form', ['pages' => $pages]);
    }

    public function edit($id)
    {
        $item = SettingsFooterMenu::find($id);
        $pages = Page::all();

        return view('admin.settings.footer.form', ['item' => $item, 'pages' => $pages]);
    }


    /**
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = SettingsFooterMenu::create([
            'title' => $request->input('title'),
            'page_id' => $request->input('page_id'),
            'url' => $request->input('url'),
            'order' => $request->input('order')
        ]);

        $user->save();

        return redirect('admin/settings/footer');
    }

    public function update(Request $request)
    {
        $item = SettingsFooterMenu::find($request->input('id'));

        $item->title = $request->input('title');
        $item->page_id = $request->input('page_id');
        $item->url = $request->input('url');
        $item->order = $request->input('order');
        $item->save();

        return redirect('admin/settings/footer');
    }

    public function destroy($id)
    {
        $item = SettingsFooterMenu::find($id);
        $item->delete();

        return redirect('admin/settings/footer');
    }


}