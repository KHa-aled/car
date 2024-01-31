<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function setlang($lang)
    {
    	app()->setlocale($lang);

    	echo trans('main.login');
    }
}
