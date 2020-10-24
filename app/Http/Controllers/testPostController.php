<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post =  Post::all(['title', 'description']);

        return view('post', compact('post'));
    }

    public function store(Request $request)
    {

        //Post::create($request->all());
        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        // ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->back();
    }

    // public function single($id)
    // {
    //     //$post = Post::where('id', $id)->get();
    //     $post = Post::findOrFail($id);

    //     return $post;
    // }


    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('postedit', compact('post'));
    }

    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);

        $post->update($request->all());

        return redirect('/post');
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();

        return redirect('/post');
    }
}
