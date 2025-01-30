<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
}
