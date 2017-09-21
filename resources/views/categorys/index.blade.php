@extends('layouts.default')
@section('title','分类列表')

@section('content')

<a href="{{ route('categorys.create') }}" class="btn btn-primary">添加分类</a>
<table class="table table-hover">
   <tr>
     <th>#</th>
     <th>分类名</th>
     <th>添加时间</th>
     <th>修改时间</th>
     <th>操作</th>
   </tr>
   @foreach($categorys as $category)
   <tr>
     <td>{{ $category->id }}</td>

     <td>
      <a href="{{ route('categorys.edit',$category->id) }}"> {{ $category->name }}</a>
     </td>
     <td><span class="glyphicon glyphicon-time"></span> {{ $category->created_at }}</td>
     <td><span class="glyphicon glyphicon-time"></span> {{ $category->updated_at }}</td>
     <td>
         @if($category->user_id === Auth::user()->id  || Auth::user()->id == 1)
       <form action="{{ route('categorys.destroy',$category->id) }}" method="POST" class="form-inline">
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

{!! $categorys->render() !!}
  <script type="text/javascript">
    $.get('http://musicmini.baidu.com/app/search/searchList.php',{"qword":"周杰伦","ie":"utf-8","page":1},function(data){
      console.log(data);
    });
  </script>
@stop
