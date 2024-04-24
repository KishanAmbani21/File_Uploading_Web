<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Post;
use Session;

class UserRegisterLoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    // Method to display the registration form
    public function register()
    {
        return view('register');
    }

    public function register_redirect(Request $request) {
        $request->session()->put('user');
        return redirect('/login');
    }


    public function login_redirect(Request $request) {
        $request->session()->put('user');
        return view('welcome');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'Name' => ['required', 'string', 'max:20'],
            'Email' => ['required', 'string', 'email', 'max:25', 'unique:users'],
            'Password' => ['required', 'string', 'min:4']
        ]);
    
        // Create a new user instance
        $user = new User();
        $user->Name = $request->Name;
        $user->Email = $request->Email;
        $user->Password = $request->Password;
        
        // Save the user instance to the database
        $result = $user->save();
    
        // Redirect back with a success or failure message
        if ($result) {
            return back()->with('success', 'You have Registered Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    public function loginUser(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'Email' => ['required', 'string', 'email'],
            'Password' => ['required', 'string', 'min:4'],
        ]);
    
        // Retrieve the user from the database based on the provided email
        $user = User::where('Email', '=', $request->Email)->first();
    
        // Check if the user exists
        if ($user) {
            // Check if the provided password matches the user's password
            if ($user->Password == $request->Password) {
                // Store the user's ID in the session
                $request->session()->put('loginId', $user->id);
                return redirect('/');
            } else {
                return back()->with('fail', 'Password Does Not Match');
            }
        } else {
            return back()->with('fail', 'This Email is Not Registered');
        }
    }
}
