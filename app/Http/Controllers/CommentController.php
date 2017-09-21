<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
class CommentController extends Controller
{
  public function store(Comment $comment,Request $request){
    dd($request->all());
     $result=$comment::create(array_merge($request->all(),["user_id"=>Auth::id()]));
    return redirect()->route('articles.show', $request->arid)
  }
}
