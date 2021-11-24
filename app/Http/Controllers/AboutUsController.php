<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{


    public function about () {

        return view('site.about-us', ['title' => 'About Us']);
    }
}
