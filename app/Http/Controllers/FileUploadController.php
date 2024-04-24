<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

use App\Models\Post;
use App\Models\User;

class FileUploadController extends Controller
{

    public function home()
    {
        return view('welcome');
    }
    
    public function uploadpost()
    {
        return view('addpost');
    }
    public function add_post(Request $request)
    {
        // Create a new Post instance
        $data = new Post;

        // Set post attributes
        $data->Title = $request->title;
        $data->Description = $request->description;

        // Get the user ID from the session
        $userId = $request->session()->get('loginId');

        // Check if user ID is available in session
        if ($userId) {
            // Set user_id to the user ID retrieved from the session
            $data->user_id = $userId;
        } else {
            // Handle the case where user ID is not available in session
            // For example, redirect to login or display an error message
            return redirect()->route('login')->with('fail', 'You must be logged in to add a post.');
        }

        // Validate request data
        $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string', 'max:100'],
            'image' => ['required', 'mimes:jpeg,png,jpg,pdf,docx,doc,txt']
        ]);

        $image = $request->image;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $extension = $image->getClientOriginalExtension();

            if (in_array($extension, ['jpeg', 'jpg', 'png'])) {
                $imageName = time() . '.' . $extension;
                $image->move('Images', $imageName);
                $data->image = $imageName;
            } elseif (in_array($extension, ['pdf'])) {
                $imageName = time() . '.' . $extension;
                $image->move('PDFs', $imageName);
                $data->image = $imageName;
            } elseif (in_array($extension, ['doc', 'docx', 'txt'])) {
                $imageName = time() . '.' . $extension;
                $image->move('DOCs', $imageName);
                $data->image = $imageName;
            } else {
                return redirect()->back()->with('error', 'Invalid file type.');
            }
        }

        try {
            // Save the Post instance to the database
            $data->save();

            return redirect()->back()->with('success', 'Post added successfully.');
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error saving post: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to save post. Please try again later.');
        }
    }

    public function view_post()
    {
        // Retrieve all posts
        $post = Post::all();

        // Return the view with the posts data
        return view('viewpost', compact('post'));
    }

    // Method to view posts with images
    public function image()
    {
        // Retrieve posts with images
        $post = Post::all();

        // Return the view with the posts data
        return view('image', compact('post'));
    }

    // Method to view posts with PDFs
    public function pdf()
    {
        // Retrieve posts with PDFs
        $post = Post::all();

        // Return the view with the posts data
        return view('pdf', compact('post'));
    }

    // Method to view posts with documents (DOC, DOCX)
    public function doc()
    {
        // Retrieve posts with documents
        $post = Post::all();

        // Return the view with the posts data
        return view('doc', compact('post'));
    }
}
