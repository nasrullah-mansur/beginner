<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use App\Mail\testMail;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
    //    $post = Post::findOrFail(1);

    //   return $post->category()->attach(3);

        // $post = Post::find(3);
        // return $post->with('user')->get();
        $post = Post::all();
         //$user = User::all();
        //return response()->json(['post'=>$post, 'user'=>$user], Response::HTTP_OK);
        // $user = User::findOrFail(1);
       //return $user->post()->get();

       return view('admin.post.index', compact('post'));
    }

   public function create(){
       $cats =  Category::all();
       return view('admin.post.create', compact('cats'));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //    $tag =  Tag::where('name', 'testing')->first();
    //     if($tag == ''){
    //         return true;
    //     }
    //     return;
        //return $request->all();
        //return $request->category;
        //return Auth::user()->id;
          //auth()->user()->post()->create($request->all());
    
          if (Gate::allows('add-post')) {
            $post = Post::find(22);

            $post->image()->create(['name'=>'updated']);
  
           $post = Post::create([
                'title'=> $request->title,
                'description'=> $request->description,
                'user_id'=> auth()->user()->id
            ]);
           
            $post->image()->create(['name'=>'test']);
  
            $post->category()->attach($request->category);
  
            foreach($request->tag as $tag){
              $tagDatabase =  Tag::where('name', $tag)->first();
              if($tagDatabase == ''){
                  $post->tag()->save(new Tag(['name'=>$tag]));
              }else{
                   $post->tag()->attach($tagDatabase);
              }
            }
              Mail::to(auth()->user()->email)->send(new testMail($post));
            
          return redirect()->route('post.index');
        }else{
            abort(403, 'you r not allowed.');
        }

          

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->back();
    }
}
