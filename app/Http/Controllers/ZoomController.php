<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\Constant;
use App\Models\Contact; 
use Illuminate\Support\Facades\Mail;
use App\Mail\ZoomMeetingLink;

class ZoomController extends Controller
{
    public function createMeeting(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required',
            'start_date_time' => 'required|date',
            'contact_id' => 'required|exists:contacts,id', // Ensure the model name is correct
        ]);

        $constant_duration = Constant::where('type', 'duration_of_meeting')->first();
        $constant_time_zone = Constant::where('type', 'time_zone')->first();

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->generateToken(),
                'Content-Type' => 'application/json',
            ])->post("https://api.zoom.us/v2/users/me/meetings", [
                'time_zone' => $constant_time_zone->content,
                'topic' => $validated['title'],
                'type' => 2, // 2 for scheduled meeting
                'start_time' => Carbon::parse($validated['start_date_time'])->toIso8601String(),
                'duration' => $constant_duration->content,
            ]);

            $meetingData = $response->json();
            $joinUrl = $meetingData['join_url'] ?? null;

            // Save the Zoom link to the Contact model
            if ($joinUrl) {
                $contact = Contact::find($validated['contact_id']);
                $contact->zoom_link = $joinUrl;
                $contact->save();

                // Send email with Zoom link
                Mail::to($contact->email)->send(new ZoomMeetingLink($contact, $joinUrl));
            }

            return view('main.apply');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    protected function generateToken(): string
    {
        try {
            $base64String = base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET'));
            $accountId = env('ZOOM_ACCOUNT_ID');

            $responseToken = Http::withHeaders([
                "Content-Type" => "application/x-www-form-urlencoded",
                "Authorization" => "Basic {$base64String}"
            ])->post("https://zoom.us/oauth/token?grant_type=account_credentials&account_id={$accountId}");

            return $responseToken->json()['access_token'];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
