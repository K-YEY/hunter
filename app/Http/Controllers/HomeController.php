<?php

namespace App\Http\Controllers;

use App\Models\Admin\FAQ;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Service::with('type')->where('status', 'publish')->take(8)->get();
        $faqs = FAQ::all();

        return view('main.index', compact('data','faqs'));
    }
    public function done()
    {
        $job_id = session('job_id');
        $formData = session('formData');
        if(!$formData) {
            return redirect()->route('home.contact')->withErrors(['error' => 'Form data not found in session.']);
        }

        if (!$job_id) {
            return redirect()->route('home.career')->withErrors(['error' => 'Job ID not found in session.']);
        }

        session()->forget('job_id');
        session()->forget('formData');
        return view('main.apply');
    }
}
