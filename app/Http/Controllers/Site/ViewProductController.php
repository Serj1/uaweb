<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\SettingsFooterMenu;

class ViewProductController extends Controller
{

    public function index($id)
    {
        $menu = Categories::buildMenu();

        $item = Products::find($id);

        $footerMenu = SettingsFooterMenu::buildMenu();

        $return = [
            'menu' => $menu,
            'item' => $item,
            'footerMenu' => $footerMenu
        ];

        return view('site.product', $return);
    }


}