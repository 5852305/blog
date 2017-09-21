@extends('layouts.default')
@section('title',$article->title)

@section('content')
<link rel="stylesheet" href="/editormd/css/editormd.min.css">
<div class="@if(!empty($h3)) col-md-9 @else col-md-12 @endif pull-right">
  <div class="panel panel-default">
    <div class="panel-header text-center">
      <h1 class="article-title">{{ $article->title }} </h1>
        <div class="article-meta text-center">
             <span class="glyphicon glyphicon-user"></span><a href="{{route('users.show',$article->user_id)}}"> {{ $article->user->name }}</a>⋅
             <i class="fa fa-clock-o"></i> <abbr data-toggle="tooltip" data-placement="top" title="{{ $article->created_at }}">
                {{ $article->created_at->diffForHumans() }}</abbr>.
            <i class="fa fa-eye"></i> {{ $article->view }}
          </div>
    </div>
    <div class="panel-body " id="article-content">
        <textarea style="display: none">{{ $article->content}}</textarea>
    </div>
  </div>
  <div class="text-muted well well-sm">
    分类： <i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;
    <a href="?categorys={{ $article->categorys->name }}" rel="category tag">{{ $article->categorys->name }}</a>
     <div class="clearfix"></div>
    @if($article->tags)
        标签： <i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;
    @foreach($article->tags as $tag)
          <a href="?tag={{ $tag->name }}" rel="tag">{{ $tag->name }}</a>
    @endforeach
    @endif
    <div>声明： {{ $article->statement }}</div>
  </div>
  <nav aria-label="...">
    <ul class="pager">
      @if($prev || $next)
      @if($prev)
      <li class="previous"><a href="{{ route('articles.show',$prev->id) }}"><span aria-hidden="true">&larr;</span> {{ $prev->title }}</a></li>
       @else
      <li class="previous disabled" ><a href="#">没有了</a></li>
      @endif
    @if($next)
    <li class="next"><a href="{{ route('articles.show',$next->id) }}"><span aria-hidden="true">&rarr; </span>{{ $next->title }}</a></li>
     @else
       <li class="next disabled" ><a href="#">没有了</a></li>
    @endif
    @endif
    </ul>
  </nav>
  <a class="back-to-top btn btn-block btn-primary" href="#top">返回顶部</a>
  <!-- <div class="row">
    @if($article->comments)
     @foreach ($article->comments as $comment)
        <div class="media">
      <div class="media-left media-middle">
        <a href="#">
          <img class="media-object" src="..." alt="...">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading">Middle aligned media</h4>
          {{$comment->created_at->diffForHumans() }}
        <p class="card-text">{{ $comment->body }}</p>
      </div>
      </div>
    @endforeach
    @else
    暂时没有评论
    @endif
  </div>
  <div class="card">
      <div class="card-header">
          添加评论
      </div>
      <div class="card-block">
          <form method="post" action="article/{{ $article->id }}/comments">
              {{ csrf_field() }}
              <fieldset class="form-group">
                  <textarea class="form-control" id="body" rows="3" name="body" required @if(!Auth::check()) disabled @endif placeholder="@if(Auth::check()) 请输入评论内容 @else 需要登录后才能发表评论 @endif"></textarea>
              </fieldset>
              <button type="submit" class="btn btn-primary" @if(!Auth::check()) disabled @endif>提交</button>
          </form>
      </div>
  </div> -->
</div>
@if(!empty($h3))
<div class="col-md-3 pull-left" >
  <div  class="panel panel-default hidden-xs hidden-md" data-spy="affix" data-offset-top="60" data-offset-bottom="200" >
  <nav  class="collapse in" id="navbar-example">
  	<ul class="nav">
          @foreach($h3 as $k=>$h)
          <li class="@if($k==0)active @endif"><a href="#{{ $h }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $h }}</a></li>
          @endforeach
  			</ul>
  </nav>
</div>
</div>
@endif



<script src="/editormd/editormd.min.js" type="text/javascript"></script>
<script src="{{asset('editormd/lib/marked.min.js')}}"></script>
<script src="{{asset('editormd/lib/prettify.min.js')}}"></script>
<script src="{{asset('editormd/lib/raphael.min.js')}}"></script>
<script src="{{asset('editormd/lib/underscore.min.js')}}"></script>
<script src="{{asset('editormd/lib/sequence-diagram.min.js')}}"></script>
<script src="{{asset('editormd/lib/flowchart.min.js')}}"></script>
<script src="{{asset('editormd/lib/jquery.flowchart.min.js')}}"></script>
<script >
$(function(){
    $("[data-toggle='tooltip']").tooltip({html : true });
  var testEditormdView;
        testEditormdView = editormd.markdownToHTML("article-content", {
            htmlDecode      : "style,script,iframe",  // you can filter tags decode
            emoji           : true,
            taskList        : true,
            tex             : true,  // 默认不解析
            flowChart       : true,  // 默认不解析
            sequenceDiagram : true,  // 默认不解析
        });
        $('#article-content h3').each(function(i){
            var text=$(this).text();
            var id=$(this).children('a').attr('href',"#"+text).text("#");
           $(this).attr('id',text)
        });

});

</script>
@stop
