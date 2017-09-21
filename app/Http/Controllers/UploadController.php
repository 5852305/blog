<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UploadController extends Controller
{

    public function store(Request $request){
      // $originalName = $file->getClientOriginalName(); // 文件原名
      // $ext = $file->getClientOriginalExtension();     // 扩展名
      // $realPath = $file->getRealPath();   //临时文件的绝对路径
      // $type = $file->getClientMimeType();     // image/jpeg
      $file = $request->file('file');
      if($file->isValid() && $request->id){//是修改图片
        $oldimage=Article::find($request->id);

        $isimage=Storage::disk('qiniu')->exists($oldimage->image);//判断图片是否存在
       if($isimage){  //有图片
         $delimage=Storage::disk('qiniu')->delete($oldimage->image);//删除图片
            if($delimage){  //有图片
                $path = $request->file('file')->store('title/'.time(), 'qiniu'); //上传
            }
      }else{
        $path = $request->file('file')->store('title/'.time(), 'qiniu'); //上传
          $oldimage->update(['image'=>$path]);
      }
     }else{   //新建图片
        $path = $request->file('file')->store('title/'.time(), 'qiniu'); //上传
     }
     if($path){
        $array = array('sta'=>'success','info'=>'上传成功!','data'=>$path);
     }else{
           $array = array('sta'=>'error','info'=>'上传失败!');
     }
     return $array;
    }
    public function destroy(Request $request){
          $disk = \Storage::disk('qiniu');
          $disk->delete($request->del_file);
       session()->flash('success', '成功删除图片！');
      return back();
    }
}
