<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Page;
use App\Models\SettingsFooterMenu;
use App\Models\Brands;
use App\Models\Lang;

class PageViewController extends Controller
{

    public function index($id)
    {

        $menu = Categories::buildMenu();

        $page = Page::find($id);

        $cities = Cities::all();

        $langs = Lang::all();

        if (!$page) {
            abort(404);
        }


        $footerMenu = SettingsFooterMenu::buildMenu();

        return view('site.page', ['item' => $page, 'menu' => $menu, 'footerMenu' => $footerMenu, 'cities' => $cities,
            'langs' => $langs, 'current_lang' => $this->current_lang,
            'current_city' => $this->current_city]);
    }


}