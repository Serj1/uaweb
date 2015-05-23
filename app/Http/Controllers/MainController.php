<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Blog;
use App\Models\Lang;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Cities;
use App\Models\SettingsFooterMenu;

class MainController extends Controller
{

    public function index()
    {
        $menu = Categories::buildMenu();

        $blog_posts = Blog::all()->take(3);

        $products = Products::getFakePopularProducts();

        $brands = Brands::getFakePopularBrands();

        $productToDay = Products::getFakeProductToDay()->toArray();

        $footerMenu = SettingsFooterMenu::buildMenu();

        $cities = Cities::all();

        $langs = Lang::all();


        $return = [
            'menu' => $menu,
            'posts' => $blog_posts,
            'cities' => $cities,
            'langs' => $langs,
            'products' => $products->toArray(),
            'brands' => $brands->toArray(),
            'productToDay' => ($productToDay) ? $productToDay[0] : null,
            'footerMenu' => $footerMenu,
            'current_lang' => $this->current_lang,
            'current_city' => $this->current_city
        ];

        return view('index', $return);
    }

}