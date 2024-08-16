<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Career;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
        $jobs = Job::count();
        $contacts = Contact::count();
        $careers = Career::count();
        return view('dashboard.index', compact('jobs', 'contacts', 'careers'));
    }



}
