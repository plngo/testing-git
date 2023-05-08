<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aimeos\Shop\Facades\Shop;

class CustomizeController extends Controller
{
    public function categories()
    {
        foreach (config('shop.page.categories') as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }
        // do some more stuff
        return \View::make('categories', $params);
    }


    public function recipes()
    {
        foreach (config('shop.page.categories') as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }
        // do some more stuff
        return \View::make('recipes', $params);
    }

    public function aboutUs()
    {
        foreach (config('shop.page.categories') as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }
        // do some more stuff
        return \View::make('aboutUs', $params);
    }

    public function contactUs()
    {
        foreach (config('shop.page.categories') as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }
        // do some more stuff
        return \View::make('contactUs', $params);
    }

    public function myFavorites()
    {
        foreach (config('shop.page.categories') as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }
        // do some more stuff
        return \View::make('myFavorites', $params);
    }

    public function profilePassword()
    {
        foreach (config('shop.page.categories') as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }
        // do some more stuff
        return \View::make('password', $params);
    }
    public function profileAccount()
    {
        foreach (config('shop.page.categories') as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }
        return \View::make('my-account', $params);
    }

    public function profileOrders()
    {
        foreach (config('shop.page.categories') as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }
        // do some more stuff
        return \View::make('my-orders', $params);
    }

}
