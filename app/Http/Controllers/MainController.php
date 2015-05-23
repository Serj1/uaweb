<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Blog;
use App\Models\Products;
use App\Models\Brands;
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

        $return = [
            'menu' => $menu,
            'posts' => $blog_posts,
            'products' => $products->toArray(),
            'brands' => $brands->toArray(),
            'productToDay' => ($productToDay) ? $productToDay[0] : null,
            'footerMenu' => $footerMenu
        ];

        return view('index', $return);
    }

}