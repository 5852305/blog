
// 预览图片
function preview_image(path) {
$("#modal-image-view").modal("show");
}
$(function(){
  var options = {
     beforeSubmit:  showRequest,
     success:       showResponse,
     dataType: 'json'
  };
  $('#file').on('change', function(){
     $('#upload-avatar').html('正在上传...');
     $('#upload').ajaxForm(options).submit();
  });
  function showRequest() {
  $("#validation-errors").hide().empty();
  return true;
  }

  function showResponse(response)  {
  if(response.success == false)
  {
  var responseErrors = response.errors;
  $.each(responseErrors, function(index, value)
  {
    if (value.length != 0)
    {
        $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
    }
  });
  $("#validation-errors").show();
  } else {
  $('#image').val(response.data);
  $('#preview-image').attr('src','http://oqnfktw73.bkt.clouddn.com/'+response.data);
  $('#delete-file-name1').html(response.data);
  $('#delete-file-name2').val(response.data);
  $("#validation-errors").append('<div class="alert alert-success"><strong>'+ response.info +'</strong><div>');
  $('#close').trigger('click');
  }
  }



});
