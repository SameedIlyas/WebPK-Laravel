<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Display the login form
    public function showLogin()
    {
        return view('admin.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the request data (make sure username and password are provided)
        $credentials = $request->only('username', 'password'); // Use username
    
        // Attempt to log in the user using username and password
        if (Auth::attempt($credentials)) {
            // Check if the authenticated user has the 'admin' role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
    
            // Log out the user if they are not an admin
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Unauthorized access.');
        }
    
        // If credentials are invalid
        return redirect()->route('admin.login')->with('error', 'Invalid credentials.');
    }

    // Admin dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
