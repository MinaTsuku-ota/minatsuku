<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Article;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    // named route で指定したいので function にします
    protected function redirectTo ()
    {
        return route('dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // ミドルウェアの設定
    public function __construct()
    {
        // logout以外にguestを適用
        // guest:ログインしていたらリダイレクトする
        $this->middleware('guest')->except('logout');
    }

    // AuthenticatesUsersトレイトのusername()を継承
    // 認証をusername+passwordとする
    // 認証カラムはuniqueである必要がある
    public function username()
    {
      return 'name';
    }

    // ログアウト時の動作
    // Illuminate\Foundation\Auth\AuthenticatesUsers のloggedOutメソッドをオーバーライド
    protected function loggedOut(Request $request)
    {
        return redirect()->route('articles.index');
    }

}
