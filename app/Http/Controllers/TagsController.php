<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Auth;
class TagsController extends Controller
{
    public function index(Tag $tag){
      $tags=$tag::orderBy('id','desc')->paginate(20);
     return view('tags.index',compact('tags'));
    }
    public function create(){
        return view('tags.create');
    }
    public function store(Request $request)
  {

      $this->validate($request, [
          'name' => 'required|unique:tags|max:20',
      ]);

      $data=$request->all();
      $data['user_id'] =Auth::user()->id;
       $tag  = Tag::create($data);
      session()->flash('success', '添加标签'.$tag->name.'成功');
      return back();
  }
    public function edit(Tag $tag)
    {
       return view('tags.edit',compact('tag'));
    }
    public function update(Tag $tag,Request $request){
      $this->validate($request, [
        'name' => 'required|unique:tags|max:20',
      ]);
       $tag->update($request->all());
      session()->flash('success', '修改标签'.$tag->name.'成功');
      return redirect()->route('tags.index');
    }
    public function destroy(Tag $tag){
      $tag->delete();
      session()->flash('success', '成功删除标签！');
      return back();
    }
}
