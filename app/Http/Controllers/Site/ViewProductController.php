<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\SettingsFooterMenu;
use App\Models\Brands;
use App\Models\Cities;
use App\Models\Lang;

class ViewProductController extends Controller
{

    public function index($id)
    {
        $menu = Categories::buildMenu();

        $item = Products::find($id);

        if (!$item) {
            abort(404);
        }

        $cities = Cities::all();

        $langs = Lang::all();

        $footerMenu = SettingsFooterMenu::buildMenu();

        $return = [
            'menu' => $menu,
            'item' => $item,
            'cities' => $cities,
            'langs' => $langs,
            'footerMenu' => $footerMenu,
            'current_lang' => $this->current_lang,
            'current_city' => $this->current_city
        ];

        return view('site.product', $return);
    }


}