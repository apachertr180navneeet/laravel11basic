<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Mail, DB, Hash, Validator, Session, File,Exception;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    /**
     * Handle admin login
     */
    public function loginPost(Request $request)
    {
        try {
            // Validate the request inputs
            $request->validate([
                'email' => 'required|email', // Ensure email is provided and valid
                'password' => 'required|min:6', // Password must be at least 6 characters
            ]);

            // Attempt to authenticate the user with additional role-based check
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])) {
                // Redirect to admin dashboard on successful login with success message
                return redirect()->route('admin.dashboard')->with('success', 'Login successful.');
            }

            // Redirect back with an error message and retain old input (except password)
            return back()->withErrors(['error' => 'Invalid credentials'])->withInput($request->only('email'));
        } catch (Exception $e) {
            // Log the exception for debugging purposes
            Log::error('Login error: ' . $e->getMessage());
            
            // Redirect back with a generic error message
            return back()->withErrors(['error' => 'An unexpected error occurred. Please try again.' . $e->getMessage()]);
        }
    }

    public function showForgetPassword(){
        return view('admin.auth.forgotpassword');
    }

    /**
     * Logout function
     */
    public function logout()
    {
        try {
            Auth::logout();
            return redirect()->route('admin.login');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Logout failed: ' . $e->getMessage());

            // Optionally, you can redirect with an error message
            return redirect()->route('admin.login')->with('error', 'Logout failed, please try again.');
        }
    }
    /**
     * Get Profile Settings
     */
    public function getProfile()
    {
        try {
            $user = Auth::user();
            return view('admin.profile.profile', compact('user'));
        } catch (\Exception $e) {
            // Log the exception or handle it accordingly
            \Log::error("Error fetching profile: " . $e->getMessage());
            
            // Optionally, you can redirect the user or show a custom error message
            return redirect()->route('home')->with('error', 'There was an issue retrieving your profile.');
        }
    }


    /**
     * Get Profile Settings
     */
    public function updateProfile(Request $request)
    {
        try {
            // Get the currently authenticated user
            $user = Auth::user();
            
            // Validate the incoming request data
            $data = $request->all();
            $validator = Validator::make($data, [
                "name" => "required|string|max:255", // Name is required, must be a string and max 255 chars
                "email" => "required|email|unique:users,email," . $user->id, // Email is required and must be unique excluding current user's email
                "phone" => "required|numeric|min:9|unique:users,phone," . $user->id, // Phone is required, numeric, and unique excluding current user's phone
                "address" => "required|string|max:500", // Address is required, must be a string and max 500 chars
                "avatar" => "sometimes|image|mimes:jpeg,jpg,png|max:5000" // Avatar is optional, must be an image and within size limit
            ]);            

            // If validation fails, return back with errors and input values
            if ($validator->fails()) {
                return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
            }

            // If the user uploaded an avatar
            if ($request->hasFile("avatar")) {
                $file = $request->file("avatar");
                // Create a unique filename using the current timestamp and the original filename
                $filename = time() . $file->getClientOriginalName();
                // Define the folder to store the avatar
                $folder = "uploads/user/";
                $path = public_path($folder);
                
                // Check if the directory exists, if not, create it
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0777, true); // Set permission to 0777 for full access
                }

                // Move the file to the destination folder
                $file->move($path, $filename);
                
                // Update the user's avatar path in the database
                $user->avatar = $folder . $filename;
            }

            // Update other user details
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;

            // Save the updated user record to the database
            $user->save();

            // Redirect back with a success message
            return redirect()->back()->with("success", "Profile updated successfully!");
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            \Log::error("Error updating profile: " . $e->getMessage());
            
            // Optionally, you can redirect the user to the home page with an error message
            return redirect()->route('home')->with('error', 'There was an issue updating your profile.');
        }
    }
}
