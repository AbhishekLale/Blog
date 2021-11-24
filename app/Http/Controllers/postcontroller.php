<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('posts/index');
    }

    public function get($id){
        $post = post::findorfail($id);
        $post->comments;
        return view('posts.post', compact('post'));
    }

    public function store(Request $request){
       $post = new post();
       $post->title =  $request->title;
       $post->description =  $request->description;
       $post->user_id = auth()->user()->id;
       $post->save();
       return response()->json([ 'message' => 'success' ],200);
    }

    public function myposts(){
        $user_id = auth()->user()->id;
        $posts = post::where('user_id' , $user_id)->orderBy('id','desc')->get();
        return view('posts.myposts', compact('posts'));
    }
    public function allpost(){
        $user_id = auth()->user()->id;
        $posts = post::where('user_id', '!=', $user_id)->orderBy('id','desc')->get();
        return view('posts.allposts', compact('posts'));
    }

    public function delete($post_id){
        $user_id = auth()->user()->id;
        $post = post::find($post_id);
        if($post->user_id == $user_id){
            $post->delete(); 
        }
        return redirect()->route('post.myposts');
    }

    public function edit($post_id){
        $user_id = auth()->user()->id;
        $post = post::find($post_id);
        if($post->user_id == $user_id){
            return view('posts.edit' , compact('post'));
        }
        return redirect()->route('post.myposts');
    }

    public function update(Request $request, $post_id ){
        $user_id = auth()->user()->id;
        $post = post::find($post_id);
        if($post->user_id == $user_id){
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();
        }
        return redirect()->route('post.myposts');
    }

    public function getAll(){
        $user_id = auth()->user()->id;
        $posts = post::where('user_id', '!=', $user_id)->orderBy('id','desc')->get();
        return response()->json(['posts' => $posts]);
    }
}
