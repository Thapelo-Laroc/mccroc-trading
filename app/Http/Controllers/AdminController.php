<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('admin.dashboard', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'instrument' => 'required',
            'signal' => 'required',
            'news' => 'required',
            'comment' => 'required|max:120',
        ]);

        auth()->user()->posts()->create($request->all());

        return back()->with('success', 'Post created successfully.');
    }
}
