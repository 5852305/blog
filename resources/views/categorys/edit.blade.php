@extends('layouts.default')
@section('title','修改分类')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>修改 {{ $category->name }} 分类</h5>
    </div>
      <div class="panel-body">
        @include('shared._errors')
        {!! Form::model($category, ['route' => ['categorys.update', $category->id],'class'=>'form-horizontal','role'=>"form"]) !!}

           {{ method_field('PATCH') }}
           {{ csrf_field() }}
             <div class="form-group">
               {!! Form::label('name','分类名:',['class' => 'col-sm-2 control-label']) !!}
             <div class="col-sm-10">
               {!! Form::text('name',$category->name,['class'=>'form-control']) !!}
             </div>
             </div>
             <div class="form-group">
               {!! Form::label('created_at','添加日期',['class' => 'col-sm-2 control-label']) !!}
                  <div class="col-md-10">
               {!! Form::input('date','created_at',$category->created_at->format('Y-m-d'),['class'=>'form-control','disabled'=>'disabled']) !!}
                 </div>
            </div>


             <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                  @if($category->user_id === Auth::user()->id  || Auth::user()->id == 1)
                 {!! Form::submit('修改分类',['class'=>'btn btn-success form-control']) !!}
                 @endif
                 </div>
           </div>
           {!! Form::close() !!}
    </div>
      </div>
      </div>
@stop
