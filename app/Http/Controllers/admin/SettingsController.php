<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Constant;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function index(){

        $settings = Constant::all();
        return view('dashboard.settings', compact('settings'));
    }

    public function update_settings(Request $request)  {

          // Validate the incoming request
          $request->validate([
            'mail_host' => 'required|string',
            'mail_port' => 'required|string',
            'mail_username' => 'required|string',
            'mail_password' => 'nullable|string',
            'mail_encryption' => 'nullable|string',
            'mail_from_address' => 'required|string',
            'mail_from_name' => 'required|string',
            'zoom_client_id' => 'required|string',
            'zoom_client_secret' => 'required|string',
            'zoom_account_id' => 'required|string',
            'time_zone' => 'required|string',
            'duration_of_meeting' => 'required|string',
        ]);

        // Define the settings to update
        $settings = [
            'MAIL_HOST' => $request->input('mail_host'),
            'MAIL_PORT' => $request->input('mail_port'),
            'MAIL_USERNAME' => $request->input('mail_username'),
            'MAIL_PASSWORD' => $request->input('mail_password'),
            'MAIL_ENCRYPTION' => $request->input('mail_encryption'),
            'MAIL_FROM_ADDRESS' => $request->input('mail_from_address'),
            'MAIL_FROM_NAME' => $request->input('mail_from_name'),
            'ZOOM_CLIENT_ID' => $request->input('zoom_client_id'),
            'ZOOM_CLIENT_SECRET' => $request->input('zoom_client_secret'),
            'ZOOM_ACCOUNT_ID' => $request->input('zoom_account_id'),
            'TIME_ZONE' => $request->input('time_zone'),
            'DURATION_OF_MEETING' => $request->input('duration_of_meeting'),
        ];

        try {
            // Update the settings
            foreach ($settings as $type => $content) {
                $constant = Constant::where('type', $type)->first();
                if ($constant) {
                    $constant->content = $content;
                    $constant->save();
                } else {
                    // Handle case where setting does not exist
                    Constant::create([
                        'type' => $type,
                        'content' => $content,
                    ]);
                }
            }
            Notyf()->success('Settings updated successfully.');

            // Return success response
            return redirect()->back();
        } catch (\Exception $e) {
            Notyf()->error('An error occurred while updating the settings.');
            return redirect()->back()->with('error', 'An error occurred while updating the settings.');
        }

    }


}
