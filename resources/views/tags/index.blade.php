@extends('layouts.default')
@section('title','标签列表')

@section('content')
<table class="table table-hover">
   <tr>
     <th>#</th>
     <th>Tag</th>
     <th>添加时间</th>
     <th>修改时间</th>
     <th>操作</th>
   </tr>
   @foreach($tags as $tag)
   <tr>
     <td>{{ $tag->id }}</td>
     <td>
      <a href="{{ route('tags.edit',$tag->id) }}"> {{ $tag->name }}</a>
     </td>
     <td><span class="glyphicon glyphicon-time"></span> {{ $tag->created_at }}</td>
     <td><span class="glyphicon glyphicon-time"></span> {{ $tag->updated_at }}</td>
     <td>
        @if($tag->user_id == Auth::user()->id || Auth::user()->id == 1)
       <form action="{{ route('tags.destroy',$tag->id) }}" method="POST" class="form-inline">
         {{ csrf_field() }}
         {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
       </form>
       @else
       无权限
       @endif
     </td>
   </tr>
   @endforeach
</table>
{!! $tags->render() !!}
@stop
