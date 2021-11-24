<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class commentcontroller extends Controller
{
    public function store(Request $request ,$id){
        $comment = new Comment();
        $comment->body = $request->comment;
        $comment->post_id = $id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return redirect()->route('post.single', [$id]);
    }
}
