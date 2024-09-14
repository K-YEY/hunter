<?php

namespace App\Http\Controllers;

use App\Models\Admin\CommonType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

}
