<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
class AuthController extends Controller
{
  /**
   * 将用户重定向到GitHub认证页面
   */
  public function redirectToProvider()
  {
      return Socialite::driver('github')->redirect();
  }

  /**
   * 从GitHub获取认证用户信息
   */
  public function handleProviderCallback()
  {
      $user = Socialite::driver('github')->user();

      //dd($user);
      if(!User::where('github_id',$user->id)->first()){
         $userModel=new User;
         $userModel->github_id = $user->id;
         $userModel->email = $user->email;
         $userModel->name = $user->nickname;
         $userModel->password = bcrypt($user->email);
         $userModel->avatar = $user->avatar;
         $userModel->save();
      }
      $userInstance = User::where('github_id',$user->id)->firstOrFail();
       Auth::login($userInstance);
       //登录成功
       session()->flash('success','大爷登录进来了！');
       //redirect()->intended(route('users.show', [Auth::user()]));//没有权限的时候  友好的跳转
        return back();
  }
}
