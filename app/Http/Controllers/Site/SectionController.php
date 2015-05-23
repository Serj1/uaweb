<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\SettingsFooterMenu;

class SectionController extends Controller
{

    public function index($id)
    {
        $menu = Categories::buildMenu();

        $parent = Categories::find($id);
        $products = Products::where('category_id', '=', $parent->id)->get();

        $footerMenu = SettingsFooterMenu::buildMenu();

        $return = [
            'menu' => $menu,
            'products' => $products,
            'footerMenu' => $footerMenu
        ];

        return view('site.section', $return);
    }

}