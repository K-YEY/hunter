<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Service::with('type')->where('status', 'publish')->take(8)->get();

        return view('main.index', compact('data'));
    }
    public function done()
    {
        $job_id = session('job_id');
        if (!$job_id) {
            return redirect()->route('home.career')->withErrors(['error' => 'Job ID not found in session.']);
        }

        session()->forget('job_id');
        return view('main.apply');
    }
}
