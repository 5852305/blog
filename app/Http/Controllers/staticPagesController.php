<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Parsedown;
class staticPagesController extends Controller
{

  public function show(){
    return view("static_pages.show");
  }
    public function home(Article $article){
      $articles=$article::orderBy('id','desc')->simplePaginate(15);
      $categorys=Category::all();
      return view('static_pages.home',compact('articles','categorys'));
    }
  
}
