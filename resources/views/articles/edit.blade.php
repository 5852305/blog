@extends('layouts.default')
@section('title','修改文章')

@section('content')
<link rel="stylesheet" href="/css/editormd.css">
<link rel="stylesheet" href="/css/select2.min.css">
<div class="row">
<div class="col-md-12">
  <h1>修改 {{ $article->title }}</h1>
@include('shared._errors')
 {!! Form::model($article, ['route' => ['articles.update', $article->id],'class'=>'form-horizontal','role'=>"form"]) !!}

    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <div class="form-group">
        {!! Form::label('catid','所属分类',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
          {!! Form::select('catid', $categorys, $article->catid, ['class'=>'form-control js-example-responsive','placeholder'=>'请选择一个分类']) !!}
      </div>
    </div>
      <div class="form-group">
        {!! Form::label('title','标题:',['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::text('title',$article->title,['class'=>'form-control']) !!}
      </div>
      </div>
      <div class="form-group">
          {!! Form::label('tags','选择标签',['class' => 'col-md-2 control-label']) !!}
          <div class="col-md-10">
            {!! Form::select('tags[]', $tags, null, ['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('image','标题图',['class' => 'col-md-2 control-label']) !!}
          <div class="col-md-10">
              {!! Form::hidden('image',$article->image,['class'=>'form-control']) !!}
          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-file-upload"><span class="glyphicon glyphicon-upload"></span> Edit Image  </button>
          <button type="button" class="btn btn-success" onclick="preview_image()"><span class="glyphicon glyphicon-eye-open"></span> View</button>
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('des','描述:',['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::textarea('des',$article->des,['class'=>'form-control']) !!}
      </div>
      </div>
      <div class="form-group">
        {!! Form::label('created_at','发布日期',['class' => 'col-sm-2 control-label']) !!}
           <div class="col-md-10">
        {!! Form::input('date','created_at',$article->created_at->format('Y-m-d'),['class'=>'form-control']) !!}
          </div>
     </div>

      <div class="form-group">
          {!! Form::label('content','文章详情',['class' => 'col-sm-2 control-label']) !!}
            <div class="col-md-10">
             <div id="test-editormd">
                <textarea style="display: none" name="content">{{ $article->content }}</textarea>
            </div>
          </div>
      </div>
      <div class="form-group">
        {!! Form::label('statement','声明:',['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::text('statement',$article->statement,['class'=>'form-control']) !!}
      </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          {!! Form::submit('修改文章',['class'=>'btn btn-success form-control']) !!}
          </div>
    </div>
    {!! Form::close() !!}
     @include('shared._upload',$article);
   </div>
</div>
<script src="/js/select2.full.min.js"></script>
<script src="/js/editormd.js"></script>
<script src="/js/upload.js"></script>
 <script src="/js/ajax-upload.js"></script>
   <script type="text/javascript">
   var testEditor;
         $(function() {
             // You can custom @link base url.
             editormd.urls.atLinkBase = "https://github.com/";
             testEditor = editormd("test-editormd", {
                 width     : "100%",
                 height    : 720,
                 toc       : true,
                 //atLink    : false,    // disable @link
                 //emailLink : false,    // disable email address auto link
                 todoList  : true,
                 path      : '/editormd/lib/'
             });
             $(".js-example-basic-multiple").select2({
                 placeholder: "添加标签"
             });
             $ (".js-example-responsive").select2({
               placeholder:"请选择一个分类",
                allowClear:true
             });
         });

   </script>
@stop
