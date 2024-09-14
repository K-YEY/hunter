<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $data = Job::with('type')->where('status', 'publish')->get();
        return view('main.careers', compact('data'));
    }
    public function single($id){
        $data = Job::with('type')->where('status', 'publish')->find($id);
        if(!$data) abort(404);
        return view('main.single', compact('data'));
    }
}
