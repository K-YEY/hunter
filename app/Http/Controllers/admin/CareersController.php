<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareersController extends Controller
{


    public function index(Request $request)
    {
        $query = Career::query();

        if ($request->has('search')) {
            $search = $request->input('search');

            if (Str::startsWith($search, '@')) {
                $text = Str::after($search, '@');
                $query->where('status', $text);
            } else {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%");
            }
        }

        $careers = $query->paginate(15);  // Use the $query variable here
        return view('dashboard.tables.careers.careers-table', compact('careers'));
    }

    public function destroy($id)
    {
        $career = Career::find($id);
        if (!$career) {
            Notyf()->warning('Career not found');
            return redirect()->back();
        }
        $career->delete();
        Notyf()->success('Career deleted successfully');
        return redirect()->back();
    }
    public function updateStatus(Request $request)
    {

        $career = Career::find($request->id);
        if (!$career) {
            Notyf()->warning('Career not found');
            return redirect()->back();
        }
        $career->status = $request->status;
        $career->save();
        Notyf()->success('Career status updated successfully');
        return redirect()->back();
    }
}
