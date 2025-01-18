<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB; //to write query

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all(); // Retrieve all posts
        //$posts = DB::select('select * from posts'); //another way of fetching data
        return view('posts.index', compact('posts')); // Pass the posts to the view
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:255',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->id();
        $post->save();


        return redirect('/posts')->with('success', 'Post added successfully!');
    }

    public function show(string $id)
    {
        $post=Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id){
        $post=Post::find($id);
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $post = Post::findOrFail($id); // Find the post by ID
        $post->title = $request->input('title'); // Update title
        $post->body = $request->input('body'); // Update content
        $post->save(); // Save changes to the database

        return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id); // Find the post by ID or return 404
        $post->delete();

        return redirect()->route('posts')->with('success', 'Post deleted successfully!');
    }
}
