@extends('layouts.default')
@section('title','文章列表')

@section('content')
<style media="screen">
  body{margin-top: 80px;}
</style>
<table class="table table-hover">
   <tr>
     <th>#</th>
     <th>所属分类</th>
     <th>标题</th>
     <th>Tags</th>
     <th>作者</th>
     <th>添加时间</th>
     <th>修改时间</th>
     <th>操作</th>
   </tr>
   @foreach($articles as $article)
   <tr>
     <td>{{ $article->id }}</td>
      <td>{{ $article->categorys->name }}</td>
     <td><a href="{{ route('articles.edit',$article->id) }}">{{ $article->title }}</a> &nbsp;<a href="{{ route('articles.show',$article->id) }}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
     <td>
       @if($article->tags)
             @foreach($article->tags as $tag)
                 <span class="glyphicon glyphicon-tag"></span>{{ $tag->name }}&nbsp;
             @endforeach
         @endif
     </td>
     <td>{{ $article->user->name }}</td>
     <td><span class="glyphicon glyphicon-time"></span> {{ $article->created_at->diffForHumans() }}</td>
     <td><span class="glyphicon glyphicon-time"></span> {{ $article->updated_at->diffForHumans() }}</td>
     <td>
       <form action="{{ route('articles.destroy',$article->id) }}" method="POST" class="form-inline">
         {{ csrf_field() }}
         {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
       </form>
     </td>
   </tr>
   @endforeach
</table>
{!! $articles->render() !!}
@stop
