<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){

        return view('dashboard.index');
    }
    public function table(){

        return view('dashboard.tables.table');
    }

 
}