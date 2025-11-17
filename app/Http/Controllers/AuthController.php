<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Models\Course;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('index', [
            'user' => Auth::user(),
            'totalUsers' => User::count(),
            'totalDepartments' => Department::count(),
            'totalCourses' => Course::count(),
            'totalClasses' => Classes::count(),
            'recentUsers' => User::latest()->limit(5)->get(),
            'recentClasses' => Classes::with('department', 'user')->latest()->limit(5)->get(),
        ]);
    }

    public function signin()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve the user record from the database based on the provided email
        $user = User::where('email', $request->email)->first();
        // Check if a user with the provided email exists
        if ($user) {
            // Verify the password
            if (Hash::check($request->password, $user->password)) {
                // Password is correct, log in the user
                Auth::login($user);

                return redirect()->route('dashboard');
            }
        }

        // Authentication failed, return back with error message
        return back()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', "You're logged out");
    }
}
