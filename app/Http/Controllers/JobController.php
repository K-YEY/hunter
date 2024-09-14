<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{


    public function index()
    {
        $data = Job::with('type')->where('status', 'publish')->get();
        return view('main.careers', compact('data'));
    }


    public function single($id)
    {
        $data = Job::with('type')->where('status', 'publish')->find($id);
        if (!$data) abort(404);
        return view('main.single', compact('data'));
    }
    public function jobId(Request $request)
    {
        $data = Job::where('status', 'publish')->find($request->id);
        if(!$data) abort(404);
        session(['job_id' => $request->id]);
        return redirect()->route('home.appalyCareer');
    }
}
