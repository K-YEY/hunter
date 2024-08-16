<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function index()
    {

        if (Auth::check()) {
            return redirect()->route('admin.index');
        }
        return view('dashboard.auth.login');
    }
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function login(Request $request)
    {
        // Validate the login request
        $this->validateLogin($request);

        // Attempt to log the user in
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $request->filled('remember'))) {
            
            // Regenerate session to protect against session fixation
            $request->session()->regenerate();

            // Redirect to the intended page or the dashboard
            return redirect()->intended(route('admin.index'));
        }

        // If login fails, display an error message
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string', // Ensure this matches your database field
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        // Add the error message using Notyf or any other flash message
        // Ensure Notyf is properly configured
        Notyf()->error('Invalid Username or Password');

        // Redirect back with input except the password
        return redirect()->back()
            ->withInput($request->only('username', 'remember'));
    }
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Log the user out of the application
        Auth::logout();

        // Invalidate the user's session
        $request->session()->invalidate();

        // Clear all session data
        $request->session()->flush();

        // Regenerate the CSRF token to protect against CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to the homepage or login page
        return redirect()->route('admin.login');
    }

}
