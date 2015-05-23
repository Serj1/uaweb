<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\SettingsFooterMenu;

class ViewBlogController extends Controller
{

    public function index()
    {
        $menu = Categories::buildMenu();

        $items = Blog::all();

        $footerMenu = SettingsFooterMenu::buildMenu();

        $return = [
            'menu' => $menu,
            'items' => $items,
            'footerMenu' => $footerMenu
        ];

        return view('site.blog.list', $return);


    }

    public function view($id)
    {
        $menu = Categories::buildMenu();

        $blog_posts = Blog::all()->take(3);

        $item = Blog::find($id);

        $footerMenu = SettingsFooterMenu::buildMenu();

        $return = [
            'menu' => $menu,
            'item' => $item,
            'posts' => $blog_posts,
            'footerMenu' => $footerMenu
        ];

        return view('site.blog.view', $return);
    }


}