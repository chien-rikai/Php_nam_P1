<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home()
    {
        return view('public/pages/home');
    }

    function product()
    {
        return view('public/pages/product');
    }

    function product_detail($type_name, $cat_name, $url_key)
    {
        return view('public/pages/product/product_detail');
    }
}
