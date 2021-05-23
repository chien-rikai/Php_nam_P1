<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    function home()
    {
        return view('public/pages/home');
    }

    /* hàm xử lý ngôn ngữ */
    function language($lang)
    {
        Session::put('current_lang', $lang);
        return redirect()->back();
    }
}
