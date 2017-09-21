{{-- 上传文件 --}}
<div class="modal fade" id="modal-file-upload">
    <div class="modal-dialog">
        <div class="modal-content">
{!! Form::open( [ 'route' => ['upload'], 'method' => 'POST', 'class'=>'form-horizontal','id' => 'upload', 'files' => true ] ) !!}
  @if(isset($article))
  {!! Form::text('id',$article->id,['class'=>'form-control']) !!}
  @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">Upload New File</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file" class="col-sm-3 control-label">
                            File
                        </label>
                        <div class="col-sm-8">
                            <input type="file" id="file" class="form-control" name="file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="close" data-dismiss="modal">
                        Cancel
                    </button>

                </div>
             {!! Form::close() !!}
        </div>
    </div>
</div>

{{-- 浏览图片 --}}
<div class="modal fade" id="modal-image-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    ×
                </button>
                <h4 class="modal-title">Image Preview</h4>
            </div>
            <div class="modal-body">
            @if(isset($article))
                <img id="preview-image" src="http://oqnfktw73.bkt.clouddn.com/{{ $article->image }}" class="img-responsive">
                @else
                  <img id="preview-image" src="" class="img-responsive">
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
{{-- 删除文件 --}}
<div class="modal fade" id="modal-file-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    ×
                </button>
                <h4 class="modal-title">Please Confirm</h4>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle fa-lg"></i>
                    Are you sure you want to delete the
                    <kbd><span id="delete-file-name1">file</span></kbd>
                    file?
                </p>
            </div>
            <div class="modal-footer">

              <form action="{{ route('unset') }}" method="POST" class="form-inline" id=>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                    <input type="hidden" name="del_file" id="delete-file-name2">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger">
                        Delete File
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
