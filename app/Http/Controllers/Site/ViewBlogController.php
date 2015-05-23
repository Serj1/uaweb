<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\SettingsFooterMenu;
use App\Models\Brands;
use App\Models\Cities;
use App\Models\Lang;

class ViewBlogController extends Controller
{

    public function index()
    {
        $menu = Categories::buildMenu();

        $items = Blog::all();

        $cities = Cities::all();

        $langs = Lang::all();

        $footerMenu = SettingsFooterMenu::buildMenu();

        $return = [
            'menu' => $menu,
            'items' => $items,
            'cities' => $cities,
            'langs' => $langs,
            'footerMenu' => $footerMenu,
            'current_lang' => $this->current_lang,
            'current_city' => $this->current_city
        ];

        return view('site.blog.list', $return);


    }

    public function view($id)
    {
        $menu = Categories::buildMenu();

        $blog_posts = Blog::all()->take(3);

        $item = Blog::find($id);

        if (!$item) {
            abort('404');
        }

        $footerMenu = SettingsFooterMenu::buildMenu();

        $cities = Cities::all();

        $langs = Lang::all();

        $return = [
            'menu' => $menu,
            'item' => $item,
            'cities' => $cities,
            'langs' => $langs,
            'posts' => $blog_posts,
            'footerMenu' => $footerMenu,
            'current_lang' => $this->current_lang,
            'current_city' => $this->current_city
        ];

        return view('site.blog.view', $return);
    }


}