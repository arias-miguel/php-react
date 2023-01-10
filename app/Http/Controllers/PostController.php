<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    
    public function index()
    {
        return Inertia::render('Blogs/Index',[
            'posts' => Post::with('user:id,name')->latest()->get()
        ]);
        
    }

    public function store(Request $request)
    {
        //validamos los datos
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'body' => 'required|string|max:255',
        ]);

        $request->user()->posts()->create($validated);

        return redirect(route('posts.index'));
    }

    public function edit(Post $post)
    {
        //
    }

   
    public function update(Request $request, Post $post)
    {
        //
    }

  
    public function destroy(Post $post)
    {
        //
    }
}
