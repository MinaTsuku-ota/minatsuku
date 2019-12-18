<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\OpinionMail;
use Illuminate\Support\Facades\Mail;

class OpinionController extends Controller
{
    /**
     * Create a new controller instance.
     * ミドルウェアの設定を行う
     * 
     * @return void
     */
    public function __construct()
    {
        // ログインしていない場合リダイレクト
        $this->middleware('auth');
    }


    public function show(){
        // ご意見ページビューを表示
        return view('opinion.opinion');
    }

    // ご意見ご要望の投稿処理
    public function post(Request $request){
        /* 入力したデータをメールで送信する */
        // フォームからのリクエストデータ全てを$contactに代入
        $contact = $request->all();
        // dd($contact); // デバッグ用
        Mail::to('ryu.e115752@gmail.com')->send(new OpinionMail($contact));

        return redirect()->route('articles.index')->with('message', '送信完了！');
    }
}
