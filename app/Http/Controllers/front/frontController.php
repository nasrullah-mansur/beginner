<?php

namespace App\Http\Controllers\front;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class frontController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);

        return view('front.post', compact('posts'));
        
    }

    public function image(Request $request)
    {
       User::imagecrop($request->file('image'), 10, 5);
    }
}
