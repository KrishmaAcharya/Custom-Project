<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (\Auth::attempt($credentials)) {
            // Redirect to the user profile instead of home
            return redirect()->route('edit.profile'); // Adjust this route if necessary
        }

        // If login fails, return with error message
        return redirect('login')->withError('Login details are not valid');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate registration inputs
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
        ]);

        // Create the user in the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Automatically log in the user after registration
        if (\Auth::attempt($request->only('email', 'password'))) {
            // Redirect to the user profile after registration
            return redirect()->route('edit.profile'); // Adjust this route if necessary
        }

        // If registration fails, return with error message
        return redirect('register')->withError('Error in registration process');
    }

    public function editProfile()
    {
        return view('auth.profile'); // Ensure you have this view file
    }

    public function home()
    {
        return view('home');
    }

    public function logout()
    {
        \Session::flush(); // Remove all sessions
        \Auth::logout();   // Log out the user
        return redirect('login'); // Redirect to login page
    }
}
