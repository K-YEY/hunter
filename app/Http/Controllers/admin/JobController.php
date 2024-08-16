<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CommonType;
use App\Models\Image;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JobController extends Controller
{
    //
    private static $_basePath = 'dashboard.tables.jobs';

    public function index(Request $request) {

        $query = Job::query();

        if ($request->has('search')) {
            $search = $request->input('search');

            if (Str::startsWith($search, '@')) {
                $text = Str::after($search, '@');
                $query->where('status', $text);
            } else {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('sub_title', 'LIKE', "%{$search}%");
            }
        }

        $jobs = $query->paginate(15);  // Use the $query variable here
        return view(self::$_basePath.'.job-table', compact('jobs'));
    }

    public function create()
    {

        $types = CommonType::all();
        return view(self::$_basePath.'.create-edit-job', compact('types'));
    }



    public function edit($id)
    {
        $job = Job::find($id);
        if (!$job) abort(404);
        $types = CommonType::all();
        return view(self::$_basePath.'.create-edit-job', compact('job', 'types'));
    }

    // Store a new job
    public function store(Request $request)
    {
        try{
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'list' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        $job = new Job();
        $job->title = $request->input('title');
        $job->sub_title = $request->input('sub_title');
        $job->list_of_text = $request->input('list');
        $job->desc = $request->input('description');
        $job->type_id = $request->input('type');
        $job->status = $request->has('status') && $request->input('status') === 'Publish' ? 'Publish' : 'Draft';

        if ($request->hasFile('cover_photo')) {
            $coverPath = $request->file('cover_photo')->store('covers', 'public');
            $image = Image::create(['file' => $coverPath,'type' => 'img']);
            $job->cover_id = $image->id;
        }

        $job->save();
        notyf()->success('Job created successfully');
        return   redirect()->back();}
        catch(\Exception $e){
            notyf()->error('oops! something went wrong '. $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    // Update an existing job
    public function update(Request $request)
    {
        try{
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'list' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        $job = Job::findOrFail($request->input('job_id'));
        $job->title = $request->input('title');
        $job->sub_title = $request->input('sub_title');
        $job->list_of_text = $request->input('list');
        $job->desc = $request->input('description');
        $job->type_id = $request->input('type');
        $job->status = $request->has('status') && $request->input('status') === 'Publish' ? 'Publish' : 'Draft';

        if ($request->hasFile('cover_photo')) {
            if ($job->cover) {
                Storage::disk('public')->delete($job->cover->file);
                $job->cover->delete();
            }

            $coverPath = $request->file('cover_photo')->store('covers', 'public');
            $image = Image::create(['file' => $coverPath]);
            $job->cover_id = $image->id;
        }

        $job->save();
        notyf()->success('Job updated successfully');
        return redirect()->back();
    }catch(\Exception $e){
        notyf()->error('oops! something went wrong '.$e->getMessage());

        return redirect()->back()->withInput();
    }

    }
    public function destroy($id) {

        $job = Job::find($id);
        if (!$job) {
            Notyf()->warning('Job not found.');
            return redirect()->back();
        }
        Storage::disk('public')->delete($job->cover->file);
        $job->cover->delete();
        $job->delete();
        Notyf()->success('Job deleted successfully.');
        return redirect()->back();
    }

}
