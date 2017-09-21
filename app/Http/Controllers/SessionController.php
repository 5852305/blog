<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionController extends Controller
{

  public function __construct(){
    $this->middleware('guest',[
      'only'=>['create']
    ]);
  }
  public function create(){
    return view('sessions.create');
  }
  public function store(Request $request)
  {
   $this->validate($request, [
     'email'=>'required|email|max:255',
     'password'=>'required'
   ]);
   $check=[
     'email'=>$request->email,
     'password'=>$request->password,
   ];
   if(Auth::attempt($check,$request->has('remember'))){
     //登录成功
     session()->flash('success','大爷登录进来了！');
        return back(); // redirect()->intended(route('users.show', [Auth::user()]));//没有权限的时候  友好的跳转
   }else{
     //登录失败
     session()->flash('danger','邮箱或者密码错求了');
     return redirect()->back();
   }
      return;
  }
  public function destroy()
   {
       Auth::logout();
       session()->flash('success', '您已成功退出！');
       return redirect('login');
   }
   public function loginout()
{
    Auth::logout();
    return back();
}
}
