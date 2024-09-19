<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ZoomMeetingLink;
use App\Models\Constant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index()
    {
        if (session()->has('formData')) {
            return redirect()->route('home.contact.meet');
        }
        return view('main.contact');
    }

    public function index_meet()
    {
        if (session()->has('formData')) {
            return view('main.contact2');
        }
    }
    /**
     * Store a new contact message in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate the request
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'country' => 'required',
            'message' => 'required',
        ]);

        session(['formData' => json_encode($validatedData)]);

        return redirect()->route('home.contact.meet');
    }
    public function pickDate(Request $request)
    {
        // Validate the request
        $request->validate([
            'meeting_datetime' => 'required|date_format:Y-m-d H:i:s',
        ]);

        // Check if session data exists
        if (!session()->has('formData')) {
            return response()->json(['message' => 'Error: No data found'], 400);
        }
        $data = json_decode(json: session('formData'));

        // Attempt to create a Zoom meeting
        try {
            $joinUrl = $this->createMeeting('Zoom Meeting'. $data->firstName, $request->meeting_datetime);
            if (!$joinUrl) {
                return response()->json(['message' => 'Error creating Zoom meeting'], 500);
            }
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Zoom API Error: ' . $e->getMessage()], 500);
        }

        // Retrieve form data from the session

        // Save the meeting and user details to the database
        $meeting = new Contact();
        $meeting->name = $data->firstName . ' ' . $data->lastName;
        $meeting->email = $data->email;
        $meeting->company_name = $data->company_name ?? $data->address;
        $meeting->country = $data->country;
        $meeting->message = $data->message;
        $meeting->schedule = $request->meeting_datetime;
        $meeting->zoom_link = $joinUrl;
        $meeting->save();

        // Optionally send email with Zoom link to user
        Mail::to($meeting->email)->send(new ZoomMeetingLink($meeting->name, $joinUrl));

        // Return a success response
        return response()->json(['message' => 'Meeting scheduled successfully']);
    }

    private function createMeeting($title, $start_date_time)
    {
        // Fetch the constants for duration and time zone
        // $constant_duration = Constant::where('type', 'duration_of_meeting')->first()->content ?? 30;
        // $constant_time_zone = Constant::where('type', 'time_zone')->first()->content ?? 'Europe/Kiev';

        // // Check if constants are available
        // if (is_null($constant_duration->content) || is_null($constant_time_zone->content)) {
        //     throw new \Exception('Required meeting constants not found.');
        // }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->generateToken(),
                'Content-Type' => 'application/json',
            ])->post("https://api.zoom.us/v2/users/me/meetings", [
                'time_zone' => 'Europe/Kiev',
                'topic' => $title ?? 'Meeting',
                'type' => 2, // 2 for scheduled meeting
                'start_time' => Carbon::parse($start_date_time ?? Carbon::now())->toIso8601String(),
                'duration' => 30,
            ]);

            // Check if the response is successful
            if ($response->successful()) {
                $meetingData = $response->json();
                $joinUrl = $meetingData['join_url'] ?? null;
                return $joinUrl;
            } else {
                // Log and throw an exception if the API call fails
                $errorMessage = $response->body();
                Log::error('Zoom API Error: ' . $errorMessage);
                throw new \Exception('Error creating Zoom meeting: ' . $errorMessage);
            }
        } catch (\Throwable $th) {
            // Log the error and rethrow it
            Log::error('Error creating Zoom meeting: ' . $th->getMessage());
            throw $th;
        }
    }

    protected function generateToken()
    {
        try {
            // Fetch Zoom API credentials from the 'Constant' table
            $ZOOM_CLIENT_ID = Constant::where('type', 'ZOOM_CLIENT_ID')->first();
            $ZOOM_CLIENT_SECRET = Constant::where('type', 'ZOOM_CLIENT_SECRET')->first();
            $ZOOM_ACCOUNT_ID = Constant::where('type', 'ZOOM_ACCOUNT_ID')->first();

            // Check if any of the constants are null
            if (is_null($ZOOM_CLIENT_ID) || is_null($ZOOM_CLIENT_SECRET) || is_null($ZOOM_ACCOUNT_ID)) {
                throw new \Exception('Zoom API credentials not found in the Constant table.');
            }

            // Retrieve the actual content from the constants
            $clientId = $ZOOM_CLIENT_ID->content;
            $clientSecret = $ZOOM_CLIENT_SECRET->content;
            $accountId = $ZOOM_ACCOUNT_ID->content;

            // Generate base64 encoded string from client ID and client secret
            $base64String = base64_encode($clientId . ':' . $clientSecret);

            // Make the request to Zoom's OAuth token endpoint
            $responseToken = Http::withHeaders([
                "Content-Type" => "application/x-www-form-urlencoded",
                "Authorization" => "Basic {$base64String}"
            ])->post("https://zoom.us/oauth/token", [
                'grant_type' => 'account_credentials',
                'account_id' => $accountId,
            ]);

            // Check if the request was successful and return the access token
            if ($responseToken->successful()) {
                return $responseToken->json()['access_token'];
            } else {
                // Handle any potential errors from the Zoom API
                $errorMessage = $responseToken->body();
                Log::error('Zoom API Token Error: ' . $errorMessage);
                throw new \Exception('Error fetching Zoom access token: ' . $errorMessage);
            }
        } catch (\Throwable $th) {
            // Log the error message for debugging
            Log::error('Error generating Zoom token: ' . $th->getMessage());
            throw $th;
        }
    }

}
