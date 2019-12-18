<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\OpinionMail;
use Illuminate\Support\Facades\Mail;

use App\Opinion;
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
        recaptcha($request); // app/Http/helper.php

        /* 入力したデータをDBに保存する */
        // バリデーション
        $rules = [
            'body' => 'required',
        ];
        // DBへ保存
        Auth::user()->opinions()->create($this->validate($request, $rules));

        /* 入力したデータをメールで送信する */
        // フォームからのリクエストデータ全てを$contactに代入
        $contact = $request->all();
        // dd($contact); // デバッグ用
        Mail::to('ryu.e115752@gmail.com')->send(new OpinionMail($contact));

        return redirect()->route('articles.index')->with('message', '送信完了！');
    }
}
