<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CommonType;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    private static $_basePath = 'dashboard.tables.services';

    public function index(Request $request)
    {

        $query = Service::query();

        if ($request->has('search')) {
            $search = $request->input('search');

            if (Str::startsWith($search, '@')) {
                $text = Str::after($search, '@');
                $query->where('status', $text);
            } else {
                $query->where('title', 'LIKE', "%{$search}%");
            }
        }

        $services = $query->paginate(15);  // Use the $query variable here
        return view(self::$_basePath . '.service-table', compact('services'));
    }

    public function create()
    {

        $types = CommonType::all();
        return view(self::$_basePath . '.create-edit-service', compact('types'));
    }



    public function edit($id)
    {
        $service = Service::find($id);
        if (!$service) abort(404);
        $types = CommonType::all();
        return view(self::$_basePath . '.create-edit-service', compact('service', 'types'));
    }

    // Store a new job
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'sub_title' => 'required|string|max:255',
                'list' => 'required|string',
                'description' => 'required|string',
                'text_head_line_desc' => 'required|string',
                'text_head_line_list' => 'required|string',
                'type' => 'required|string',
                'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);

            $service = new Service();
            $service->title = $request->input('title');
            $service->desc = $request->input('description');
            $service->type_id = $request->input('type');
            $service->list_of_text = $request->input('list');
            $service->sub_title = $request->input('sub_title');
            $service->text_highlight_desc = $request->input('text_head_line_desc');
            $service->text_highlight_list = $request->input('text_head_line_list');
            $service->status = $request->has('status') && $request->input('status') === 'Publish' ? 'Publish' : 'Draft';

            if ($request->hasFile('cover_photo')) {
                $coverPath = $request->file('cover_photo')->store('covers', 'public');
                $image = Image::create(['file' => $coverPath, 'type' => 'img']);
                $service->cover_id = $image->id;
            }

            $service->save();
            notyf()->success('Service created successfully');
            return   redirect()->back();
        } catch (\Exception $e) {
            notyf()->error('oops! something went wrong ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    // Update an existing job
    public function update(Request $request)
    {
        try {
            $request->validate([
                'service_id' => 'required|exists:services,id',
                'title' => 'required|string|max:255',
                'sub_title' => 'required|string|max:255',
                'text_head_line_desc' => 'required|string',
                'text_head_line_list' => 'required|string',
                'list' => 'required|string',
                'description' => 'required|string',
                'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);

            $service = Service::findOrFail($request->input('job_id'));
            $service->title = $request->input('title');
            $service->sub_title = $request->input('sub_title');
            $service->list_of_text = $request->input('list');
            $service->desc = $request->input('description');
            $service->type_id = $request->input('type');
            $service->text_highlight_desc = $request->input('text_head_line_desc');
            $service->text_highlight_list = $request->input('text_head_line_list');
            $service->status = $request->has('status') && $request->input('status') === 'Publish' ? 'Publish' : 'Draft';

            if ($request->hasFile('cover_photo')) {
                if ($service->cover) {
                    Storage::disk('public')->delete($service->cover->file);
                    $service->cover->delete();
                }

                $coverPath = $request->file('cover_photo')->store('covers', 'public');
                $image = Image::create(['file' => $coverPath]);
                $service->cover_id = $image->id;
            }

            $service->save();
            notyf()->success('Service updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            notyf()->error('oops! something went wrong ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }
    public function destroy($id)
    {

        $service = Service::find($id);
        if (!$service) {
            Notyf()->warning('Service not found.');
            return redirect()->back();
        }
        Storage::disk('public')->delete($service->cover->file);
        $service->cover->delete();
        $service->delete();
        Notyf()->success('Service deleted successfully.');
        return redirect()->back();
    }
}
