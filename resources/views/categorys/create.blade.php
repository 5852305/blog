@extends('layouts.default')
@section('title','添加分类')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>添加文章分类</h5>
    </div>
      <div class="panel-body">
        @include('shared._errors')
 {!! Form::open(['route' => ['categorys.store'],'class'=>'form-horizontal','role'=>"form"]) !!}
    {{ csrf_field() }}
      <div class="form-group">
        {!! Form::label('name','分类名:',['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
      </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          {!! Form::submit('添加分类',['class'=>'btn btn-success form-control']) !!}
          </div>
    </div>
    {!! Form::close() !!}
    </div>
      </div>
      </div>
@stop
