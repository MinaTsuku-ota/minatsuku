<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// use App\Article;

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

    protected $maxAttempts = 5;     // ログイン試行回数（回）
    protected $decayMinutes = 1;   // ログインロックタイム（分）

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    // named route で指定したいので function にします
    protected function redirectTo ()
    {
        return route('dashboard.index');
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

    /**
     * Handle a login request to the application.
     * ログイン時にの動作
     * Illuminate\Foundation\Auth\AuthenticatesUsersのloginメソッドをオーバーライドする
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // helper.php参照
        // recaptcha($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
