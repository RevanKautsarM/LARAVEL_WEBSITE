<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
    $posts = Post::latest()
        ->when(request('search'), function($query) {
            $query->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('body', 'like', '%' . request('search') . '%');
        })
        ->get();

    return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
    $data = $request->validate([
        'title' => 'required',
        'body' => 'required',
        'image' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    Post::create($data);
    return redirect('/');
    }

    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
    $data = $request->validate([
        'title' => 'required',
        'body' => 'required|min:1',
        'image' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    $post->update($data);
    return redirect('/');
    }


    public function destroy(Post $post) {
        $post->delete();
        return redirect('/');
    }
}