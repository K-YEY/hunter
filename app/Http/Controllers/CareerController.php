<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
/**
 * CareerController handles the career-related functionalities.
 *
 * Methods:
 * - index(): Retrieves and displays a list of published jobs.
 * - single($id): Retrieves and displays a single published job by its ID.
 * - appalication(): Displays the career application form with necessary data.
 * - jobId($id): Stores the job ID in session and redirects to the application form.
 * - store(Request $request): Validates and stores the career application data.
 *
 * @package App\Http\Controllers
 */
{


    public function appalication()
    {
        if (!session()->has('job_id')) {
            return redirect()->route('home.career');
        }

        $constants = Constant::all();

        return view('main.careerApply', compact('constants'));
    }


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string',
                'country' => 'required|string',
                'edu' => 'required|string',
                'another_job' => 'required|string',
                'remote' => 'required|string',
                'hear_us' => 'nullable|string',
                'other' => 'nullable|string',
                'resume' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048', // File validation
                'url' => 'required|url', // Assuming the profile is a URL
            ]);

            $job_id = session('job_id');
            if (!$job_id) {
                return redirect()->route('home.career')->withErrors(['error' => 'Job ID not found in session.']);
            }

            if ($request->hasFile('resume')) {
                $resumePath = $request->file('resume')->store('resume', 'public');
                $resumeUrl = Storage::url($resumePath);
            } else {
                $resumeUrl = null;
            }

            // Create new Career record
            Career::create([
                'job_id' => $job_id,
                'name' => $validated['firstName'] . ' ' . $validated['lastName'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'country_code' => $validated['country'],
                'education' => $validated['edu'],
                'hear_us' => $validated['hear_us'] ?? $validated['other'],
                'is_job' => $validated['another_job']  == 'Yes' ? 'True' : 'False',
                'is_remote' => $validated['remote']  == 'Yes' ? 'True' : 'False',
                'resume' => $resumeUrl,
                'profile' => $validated['url'],
                'status' => 'Reviewing',
                'ip' => $request->ip(),
            ]);

            return redirect()->route('home.done');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
