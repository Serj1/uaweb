<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Page;
use App\Models\SettingsFooterMenu;

class PageViewController extends Controller
{

    public function index($id)
    {

        $menu = Categories::buildMenu();

        $page = Page::find($id);

        $footerMenu = SettingsFooterMenu::buildMenu();

        return view('site.page', ['item' => $page, 'menu' => $menu, 'footerMenu' => $footerMenu]);
    }


}