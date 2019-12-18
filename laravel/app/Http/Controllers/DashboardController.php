<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($array=null)
    {
        // $imagesはimagesテーブルのレコードが配列で格納される
        // 後にビューでforeach文でアクセスするなどして扱う
        $articles = Article::where('user_id', Auth::user()->id)->get();

        // return view('home');
        // return view('dashboard');
        return view('dashboard', compact('articles', 'array'));
    }

    // google reCAPTCHA v3を使って送信
    public function dashboard_post(Request $request){
        // validate
        $this->validate($request, [
            'text' => 'required',
        ]);

        // app/Http/helper.php
        $response = recaptcha($request);

        if ($response->getScore() < 0.6) {
            // $status = false;
            // return response()->view('dashboard', ['status' => false]);
            return redirect()->route('dashboard')->with('message', '送信に失敗しました!');
        }
        // $articles = Article::where('user_id', Auth::user()->id)->get();
        // $status = true;
        // $score = $response->getScore();
        // return response()->view('dashboard', compact('articles', 'status', 'score'));
        return redirect()->route('dashboard')->with('message', '送信に成功しました!');
    }
}
