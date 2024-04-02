<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Assuming your Post model is in the Models directory



class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('dashboard', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'instrument' => 'required',
            'signal' => 'required',
            'news' => 'required',
            'comment' => 'required',
        ]);

        auth()->user()->posts()->create($request->all());

        return back()->with('success', 'Post created successfully.');
    }
}
