<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareersController extends Controller
{


    public function index()
    {

        // @review , @accepted , @rejected
        $careers= Career::paginate(15);
        return view('dashboard.tables.careers.careers-table',compact('careers'));
    }

}
