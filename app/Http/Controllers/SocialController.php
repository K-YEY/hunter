<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
      public function socialView(){
        $social = Social::paginate(15);
        return view('dashboard.tables.social.index', compact('social'));
    }
    public function updateSocial(Request $request)
    {
        $request->validate([
            'link' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        $social = Social::find($request->id);

        if (!$social) {
            notyf()->error('Social not found');

            return redirect()->back();
        }

        try {
            $social->link = $request->link;
            $social->status = $request->status;

            $social->save();

            notyf()->success('Social updated successfully');

            return redirect()->back();
        } catch (\Exception $e) {
            notyf()->error('Something went wrong');

            return redirect()->back();
        }
    }
}
