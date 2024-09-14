<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Service::with('type')->where('status', operator: 'publish')->take(8)->get();

        return view('main.index', compact('data'));
    }

}
