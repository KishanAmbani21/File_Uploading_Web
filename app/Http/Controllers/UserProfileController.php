<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function deletePage($id)
    {
        // Delete the post by ID
        Post::destroy($id);

        // Redirect back to the previous page
        return redirect()->back();
    }


    public function profile(Request $request)
    {
        // Retrieve all users from the database
        $loggedInUserId = $request->session()->get('loginId');
        $some = User::find($loggedInUserId);

        // Check if a user is currently logged in
        if ($request->session()->has('loginId')) {
            // Retrieve the currently logged-in user's data

            $loggedInUser = User::find($loggedInUserId);

            // Retrieve posts associated with the currently logged-in user
            $sola = $loggedInUser->posts()->get();
        } else {
            // If no user is logged in, set the posts to null
            $sola = null;
        }

        // Return the profile view with the users' data and associated posts
        return view('profile', compact('some', 'sola'));
    }

    // Method to handle user logout
    public function delete(Request $request)
    {
        // Delete the session key holding the user's login status
        $request->session()->forget('loginId');

        // Redirect to the registration page with a success message
        return redirect('register')->with('success', 'Logged out successfully');
    }
}
