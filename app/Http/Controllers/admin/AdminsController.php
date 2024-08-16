<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminsController extends Controller
{
    private static $basePath = 'dashboard.tables.admins';
    public function index()
    {

        return view(self::$basePath . '.admin-table');
    }
    public function create()
    {

        return view(self::$basePath . '.create-edit-admin');
    }
    public function store(Request $request)
    {
        try {
            // Validate input
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:admin',
                'password' => 'required|string|min:8|confirmed',
                'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:800',
                'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:800',
            ]);

            // Handle profile photo upload
            $profilePhotoPath = null;
            if ($request->hasFile('profile_photo')) {
                $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            }

            // Handle cover photo upload
            $coverPhotoPath = null;
            if ($request->hasFile('cover_photo')) {
                $coverPhotoPath = $request->file('cover_photo')->store('profile_photos', 'public');
            }

            // Create user
            Admin::create([
                'name' => $validatedData['first_name'] . ' ' . $validatedData['last_name'],
                'username' => $validatedData['username'],
                'password' => $validatedData['password'],
                'image' => $profilePhotoPath,
                'cover' => $coverPhotoPath,
            ]);
            Notyf()->success('User created successfully.');

            return redirect()->back();
        } catch (\Exception $e) {
            Notyf()->error('An error occurred while creating the user.' . $e->getMessage());
            // Handle exception
            return redirect()->back();
        }
    }
    public function edit($id)
    {

        $admin = Admin::find($id);
        if(!$admin) abort(404);
        return view(self::$basePath . '.create-edit-admin', compact('admin'));
    }

    public function update(Request $request)
    {
        try {

            $id = $request->input('admin_id');
            // Find the user by ID
            $admin = Admin::findOrFail($id);

            // Validate input
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => [
                    'required',
                    'string',
                    'max:255',
                    function ($attribute, $value, $fail) use ($admin) {
                        // Check if username is unique except for the current user
                        if ($value !== $admin->username && Admin::where('username', $value)->exists()) {
                            $fail('The username has already been taken.');
                        }
                    },
                ],
                'password' => 'nullable|string|min:8|confirmed',
                'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:800',
                'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:800',
            ]);

            // Handle profile photo upload
            if ($request->hasFile('profile_photo')) {
                if ($admin->image) {
                    Storage::disk('public')->delete($admin->image);
                }
                $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
                $admin->image = $profilePhotoPath;
            }

            // Handle cover photo upload
            if ($request->hasFile('cover_photo')) {
                if ($admin->cover) {
                    Storage::disk('public')->delete($admin->cover);
                }
                $coverPhotoPath = $request->file('cover_photo')->store('profile_photos', 'public');
                $admin->cover = $coverPhotoPath;
            }

            // Update user details
            $admin->name = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
            $admin->username = $validatedData['username'];

            // Update password if provided
            if ($request->filled('password')) {
                $admin->password = $validatedData['password']; // The mutator will handle hashing
            }

            // Save the updated user
            $admin->save();

            Notyf()->success('User updated successfully.');

            return redirect()->back();
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Capture all validation errors
            $errors = $e->errors();
            $errorMessages = implode(', ', array_map(function ($msgs) {
                return implode(', ', $msgs);
            }, $errors));

            Notyf()->error('Validation error: ' . $errorMessages);
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Notyf()->error('An error occurred while updating the user: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function showTable(Request $request)
    {
        $query = Admin::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('id', '!=', Auth::user()->id)->where('name', 'LIKE', "%{$search}%")
                ->orWhere('username', 'LIKE', "%{$search}%");
        } else {
            $search = '';
        }
        $admins = $query->where('id', '!=', Auth::user()->id)->paginate(15);

        return view(self::$basePath . '.admin-table', compact('admins', 'search'));
    }
    public function destroy($id)
    {

        $admin = Admin::find($id);
        if (!$admin) {
            Notyf()->warning('User not found.');
            return redirect()->back();
        }

        Storage::disk('public')->delete($admin->cover);
        Storage::disk('public')->delete($admin->image);
        $admin->delete();
        Notyf()->success('User deleted successfully.');
        return redirect()->back();
    }
}
