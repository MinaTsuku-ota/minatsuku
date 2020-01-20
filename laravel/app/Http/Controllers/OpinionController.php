<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\OpinionMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{
    /**
     * Create a new controller instance.
     * ミドルウェアの設定を行う
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth'); // ログインしていない場合リダイレクト
    }


    public function index(){
        // ご意見ページビューを表示
        return view('opinion.opinion');
    }

    // ご意見ご要望の投稿処理
    public function post(Request $request){
        // dd($request->all()); // デバッグ用

        recaptcha($request); // app/Http/helper.php

        /* 入力したデータをDBに保存する */
        // バリデーション
        $rules = [
            'body' => 'required',
        ];
        // DBへ保存
        Auth::user()->opinions()->create($this->validate($request, $rules));

        /* 入力したデータをメールで送信する */
        // 送信内容とユーザネームをOpinionMailへ渡す
        // Mail::to('ryu.e115752@gmail.com')->send(new OpinionMail($request->all(), Auth::user()->name));
        Mail::to('ryu.e115752@gmail.com')->queue(new OpinionMail($request->all(), Auth::user()->name));

        return redirect()->route('articles.index')->with('message', '送信完了！');
    }
}
