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
            $user = Auth::user();
            $data = $request->all();
            $validator = Validator::make($data, [
                "name" => "required",
                "email" => "required|email|unique:users,email," . $user->id,
                "phone" => "required|numeric|min:9|unique:users,phone," . $user->id,
                "address" => "required",
                "avatar" => "sometimes|image|mimes:jpeg,jpg,png|max:5000"
            ]);            
            
            if($validator->fails()) {
                return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
            }

            if($request->file("avatar")) {
                $file = $request->file("avatar");
                $filename = time() . $file->getClientOriginalName();
                $folder = "uploads/user/";
                $path = public_path($folder);
                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $file->move($path, $filename);
                $user->avatar = $folder . $filename;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            return redirect()->back()->with("success", "Profile update successfully!");
        } catch (\Exception $e) {
            // Log the exception or handle it accordingly
            \Log::error("Error fetching profile: " . $e->getMessage());
            
            // Optionally, you can redirect the user or show a custom error message
            return redirect()->route('home')->with('error', 'There was an issue retrieving your profile.');
        }
    }
}
