<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

$app->get('/', 'App\Http\Controllers\MainController@index');

$app->get('/auth', 'App\Http\Controllers\AuthController@index');


$app->get('/section/{id}', 'App\Http\Controllers\Site\SectionController@index');
$app->get('/product/{id}', 'App\Http\Controllers\Site\ViewProductController@index');


$app->get('/blog', 'App\Http\Controllers\Site\ViewBlogController@index');
$app->get('/blog/{id}', 'App\Http\Controllers\Site\ViewBlogController@view');

$app->get('/page/{id}', 'App\Http\Controllers\Site\PageViewController@index');

$app->get('/set-lang/{id}', 'App\Http\Controllers\Controller@setLang');
$app->get('/set-city/{id}', 'App\Http\Controllers\Controller@setCity');


//admin

$app->get('admin/auth', 'App\Http\Controllers\Auth\AuthController@index');

$app->post('admin/auth/login', function (Request $request) {
    if (Auth::attempt($request->only('email', 'password'))) {
        return redirect('/admin');
    } else {
        return redirect('/admin/auth');
    }
});

$app->get('/logout', function () {
    Auth::logout();
    return redirect('/admin/auth');
});

$app->group(['middleware' => 'auth'], function ($app) {
    $app->get('/admin', 'App\Http\Controllers\AdminController@index');


    // users
    $app->get('/admin/users', 'App\Http\Controllers\Users\UsersController@index');

    $app->get('/admin/user/edit/{id}', 'App\Http\Controllers\Users\UsersController@edit');

    $app->get('/admin/user/create', 'App\Http\Controllers\Users\UsersController@create');

    $app->post('/admin/user/store', 'App\Http\Controllers\Users\UsersController@store');

    $app->post('/admin/user/update/{id}', 'App\Http\Controllers\Users\UsersController@update');

    $app->get('/admin/user/remove/{id}', 'App\Http\Controllers\Users\UsersController@destroy');

    //categories
    $app->get('/admin/categories', 'App\Http\Controllers\Categories\CategoriesController@index');
    $app->get('/admin/categories/{id}', 'App\Http\Controllers\Categories\CategoriesController@view');

    $app->get('/admin/categories/create/{id}', 'App\Http\Controllers\Categories\CategoriesController@create');

    $app->get('/admin/categories/edit/{id}', 'App\Http\Controllers\Categories\CategoriesController@edit');

    $app->post('/admin/categories/store', 'App\Http\Controllers\Categories\CategoriesController@store');

    $app->post('/admin/categories/update', 'App\Http\Controllers\Categories\CategoriesController@update');

    $app->get('/admin/categories/delete/{id}', 'App\Http\Controllers\Categories\CategoriesController@destroy');

    //products
    $app->get('/admin/products', 'App\Http\Controllers\Products\ProductsController@index');

    $app->get('/admin/products/create', 'App\Http\Controllers\Products\ProductsController@create');

    $app->get('/admin/products/edit/{id}', 'App\Http\Controllers\Products\ProductsController@edit');

    $app->post('/admin/products/store', 'App\Http\Controllers\Products\ProductsController@store');

    $app->post('/admin/products/update', 'App\Http\Controllers\Products\ProductsController@update');

    $app->get('/admin/products/delete/{id}', 'App\Http\Controllers\Products\ProductsController@destroy');


    //brands
    $app->get('/admin/brands', 'App\Http\Controllers\Brands\BrandsController@index');

    $app->get('/admin/brands/create', 'App\Http\Controllers\Brands\BrandsController@create');

    $app->get('/admin/brands/edit/{id}', 'App\Http\Controllers\Brands\BrandsController@edit');

    $app->post('/admin/brands/store', 'App\Http\Controllers\Brands\BrandsController@store');

    $app->post('/admin/brands/update', 'App\Http\Controllers\Brands\BrandsController@update');

    $app->get('/admin/brands/delete/{id}', 'App\Http\Controllers\Brands\BrandsController@destroy');


    //blog
    $app->get('/admin/blog', 'App\Http\Controllers\Blog\BlogController@index');

    $app->get('/admin/blog/create', 'App\Http\Controllers\Blog\BlogController@create');

    $app->get('/admin/blog/edit/{id}', 'App\Http\Controllers\Blog\BlogController@edit');

    $app->post('/admin/blog/store', 'App\Http\Controllers\Blog\BlogController@store');

    $app->post('/admin/blog/update', 'App\Http\Controllers\Blog\BlogController@update');

    $app->get('/admin/blog/delete/{id}', 'App\Http\Controllers\Blog\BlogController@destroy');

    $app->post('/admin/blog/upload', function (Request $request) {

    });

    //pages
    $app->get('/admin/pages', 'App\Http\Controllers\Pages\PagesController@index');

    $app->get('/admin/pages/create', 'App\Http\Controllers\Pages\PagesController@create');

    $app->get('/admin/pages/edit/{id}', 'App\Http\Controllers\Pages\PagesController@edit');

    $app->post('/admin/pages/store', 'App\Http\Controllers\Pages\PagesController@store');

    $app->post('/admin/pages/update', 'App\Http\Controllers\Pages\PagesController@update');

    $app->get('/admin/pages/delete/{id}', 'App\Http\Controllers\Pages\PagesController@destroy');


    //settings
    $app->get('/admin/settings', 'App\Http\Controllers\Settings\SettingsController@index');

    // footer settings
    $app->get('/admin/settings/footer', 'App\Http\Controllers\Settings\FooterMenuController@index');

    $app->get('/admin/settings/footer/create', 'App\Http\Controllers\Settings\FooterMenuController@create');

    $app->get('/admin/settings/footer/edit/{id}', 'App\Http\Controllers\Settings\FooterMenuController@edit');

    $app->post('/admin/settings/footer/store', 'App\Http\Controllers\Settings\FooterMenuController@store');

    $app->post('/admin/settings/footer/update', 'App\Http\Controllers\Settings\FooterMenuController@update');

    $app->get('/admin/settings/footer/delete/{id}', 'App\Http\Controllers\Settings\FooterMenuController@destroy');

    //cities
    $app->get('/admin/cities', 'App\Http\Controllers\Cities\CitiesController@index');

    $app->get('/admin/cities/create', 'App\Http\Controllers\Cities\CitiesController@create');

    $app->get('/admin/cities/edit/{id}', 'App\Http\Controllers\Cities\CitiesController@edit');

    $app->post('/admin/cities/store', 'App\Http\Controllers\Cities\CitiesController@store');

    $app->post('/admin/cities/update', 'App\Http\Controllers\Cities\CitiesController@update');

    $app->get('/admin/cities/delete/{id}', 'App\Http\Controllers\Cities\CitiesController@destroy');

    //langs

    $app->get('/admin/langs', 'App\Http\Controllers\Langs\LangController@index');

    $app->get('/admin/langs/create', 'App\Http\Controllers\Langs\LangController@create');

    $app->get('/admin/langs/edit/{id}', 'App\Http\Controllers\Langs\LangController@edit');

    $app->post('/admin/langs/store', 'App\Http\Controllers\Langs\LangController@store');

    $app->post('/admin/langs/update', 'App\Http\Controllers\Langs\LangController@update');

    $app->get('/admin/langs/delete/{id}', 'App\Http\Controllers\Langs\LangController@destroy');



});









