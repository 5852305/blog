@extends('layouts.default')
@section('title','Wei U Ying')

@section('content')
@include('layouts._banner')
<link rel="stylesheet" href="/css/index.css">
    <div class="row" >
      <div class="col-md-8" >
           @foreach($articles as $article)
          <div class="row border-bottom ">
          <div class="col-lg-4 panel-body">
              <a href="{{ route('articles.show',$article->id) }}" class="thumbnail">
                <img src="http://oqnfktw73.bkt.clouddn.com/{{  $article->image }}" alt="{{  $article->title }}">
              </a>
          <div class="hidden-xs">
            <span class="glyphicon glyphicon-folder-open glyphicon-xs"></span> 所属分类：{{ $article->categorys->name }}
            <!-- <span class="glyphicon glyphicon-tag glyphicon-xs"></span> 标签：
            @if($article->tags)
                  @foreach($article->tags as $tag)
                      <a href="#">{{ $tag->name }}</a>,
                  @endforeach
              @endif -->
          </div>
          </div>
          <div class="col-lg-8 panel-content">
            <div class="caption">
              <h4><a href="{{ route('articles.show',$article->id) }}">{{  $article->title }}</a></h4>
              <span class="post-tag">
              <span class="glyphicon glyphicon-user"></span> {{ $article->user->name }}&nbsp;
              <span class="glyphicon glyphicon-calendar"></span> {{ $article->created_at->format('Y-m-d') }}&nbsp;
              <span class="glyphicon glyphicon-eye-open"></span> 1&nbsp;
              <span class="glyphicon glyphicon-comment"></span> 20
              </span>
              <p>{{ str_limit($article->des, $limit = 100, $end = '...') }}</p>
              <a href="{{ route('articles.show',$article->id) }}" ><i class="glyphicon glyphicon-link"></i> 阅读全文</a>
            </div>
          </div>
        </div>
           @endforeach

      </div>
      <div class="col-md-4 hidden-xs" >
        <aside class="panel panel-default ">
          <div class="panel-heading"><h3 class="widget-title panel-title">文章分类</h3>
          </div><div class="panel-body">
            <div class="list-group">
              @foreach($categorys as $category)
              <a href="#" class="list-group-item">
                <span class="badge">{{ $category->articles->count() }}</span><span class="glyphicon ipt-icon-file">
                </span>{{ $category->name }}<span class="clearfix"></span>
              </a>
              @endforeach
            </div>
          </div>
          </aside>

      </div>

      </div>


@stop
