<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\SettingsFooterMenu;
use App\Models\Brands;
use App\Models\Cities;
use App\Models\Lang;

class SectionController extends Controller
{

    public function index($id)
    {
        $menu = Categories::buildMenu();

        $parent = Categories::find($id);
        $products = Products::where('category_id', '=', $parent->id)->get();

        $cities = Cities::all();

        $langs = Lang::all();

        $footerMenu = SettingsFooterMenu::buildMenu();

        $return = [
            'menu' => $menu,
            'products' => $products,
            'cities' => $cities,
            'langs' => $langs,
            'footerMenu' => $footerMenu,
            'current_lang' => $this->current_lang,
            'current_city' => $this->current_city
        ];

        return view('site.section', $return);
    }

}