<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Tag;
use Auth;
use Parsedown;
use App\User;
use App\Category;
use App\Repository\ArticlesRepository;
class ArticlesController extends Controller
{
protected $article;
  public function __construct(ArticlesRepository $article){
    $this->middleware('auth',[
      'except'=>['show']
    ]);
    $this->article = $article;
}
  public function index(User $users){
    $articles=Article::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
     return view('articles.index', compact('articles','users'));
  }
  public function create()
     {
       $tags=Tag::pluck('name','id')->toArray();
       $categorys=Category::pluck('name','id')->toArray();
      return view('articles.create',compact('tags','categorys'));
     }

     public function show(Article $article)
     {
          $Parsedown = new Parsedown();
          preg_match_all("/<h3>(.*?)<\/h3>/", $Parsedown->text($article->content), $result);
          $h3=$result[1];
        $prevId=Article::where('id','<',$article->id)->max('id');
        $nextId=Article::where('id','>',$article->id)->min('id');

        $prev=Article::find($prevId);
        $next=Article::find($nextId);
        $article->increment('view');//记录一次阅读量
         return view('articles.show', compact('article','h3','prev','next'));
     }
     public function store(Request $request)
   {

       $this->validate($request, [
           'title' => 'required|max:100',
           'content' => 'required|max:20000',
           'tags'    => 'required',
           'image'   =>'required|max:250',
           'des'   =>'required|max:200',
           'catid'   =>'required',
            'statement'   =>'required',

       ]);
        $data=$request->all();
        $data['user_id'] =Auth::user()->id;
        $article  = Article::create($data);
        $article->tags()->attach($request->tags);
        $article->categorys()->increment('count');
       session()->flash('success', '添加文章'.$article->title.'成功');
       return redirect()->route('articles.show', $article->id);
   }

   public function edit(Article $article){
    $tags=Tag::pluck('name','id')->toArray();
    $categorys=Category::pluck('name','id')->toArray();
     return view('articles.edit',compact('article','tags','categorys'));
   }

   public function update(Article $article,Request $request){
     $this->validate($request, [
       'title' => 'required|max:100',
       'content' => 'required|max:20000',
       'tags'    => 'required',
       'image'   =>'required|max:250',
       'des'   =>'required|max:200',
       'catid'   =>'required',
       'statement'   =>'required',
     ]);
      $article->update($request->all());
      // 跟attach()类似，我们这里使用sync()来同步我们的标签
      $article->tags()->sync($request->tags);
      $article->categorys()->increment('count');
     session()->flash('success', '修改文章'.$article->title.'成功');
     return redirect()->route('articles.show', $article->id);
   }
  public function destroy(Article $article){
    $article->delete();
    session()->flash('success', '成功删除文章！');
    return back();
  }
  public function allarticle()
  {
      return $this->article->ByAll();
  }
  public function singlearticle($id)
  {
      $result = $this->article->Byid($id);

      return $result;
  }
}
