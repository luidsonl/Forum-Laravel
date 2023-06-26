<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function about(){
        return view('site/about');
    }
    //retorna uma view chamada 'site/contact'
}
