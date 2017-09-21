<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
class CategorysController extends Controller
{
  public function index(Category $category){
    $categorys=$category::orderBy('id','desc')->paginate(20);
   return view('categorys.index',compact('categorys'));
  }
  public function create(){
      return view('categorys.create');
  }
  public function store(Request $request)
{

    $this->validate($request, [
        'name' => 'required|unique:categorys|max:20',
    ]);

    $data=$request->all();
    $data['user_id'] =Auth::user()->id;
     $category  = Category::create($data);
    session()->flash('success', '添加分类'.$category->name.'成功');
    return back();
}
  public function edit(Category $category)
  {
     return view('categorys.edit',compact('category'));
  }
  public function update(Category $category,Request $request){
    $this->validate($request, [
      'name' => 'required|unique:categorys|max:20',
    ]);
    
     $category->update($request->all());
    session()->flash('success', '修改分类'.$category->name.'成功');
    return redirect()->route('categorys.index');
  }
  public function destroy(Category $category){
    $category->delete();
    session()->flash('success', '成功删除分类！');
    return back();
  }
}
