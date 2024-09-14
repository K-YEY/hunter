<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index(){
        return view('main.about-us');

    }
    public function privacy_page(){
        return view('main.privacy');

    }
}
