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
    public function index()
    {
        // $imagesはimagesテーブルのレコードが配列で格納される
        // 後にビューでforeach文でアクセスするなどして扱う
        $articles = Article::where('user_id', Auth::user()->id)->get();

        // return view('home');
        // return view('dashboard');
        return view('dashboard', compact('articles'));
    }

    // google reCAPTCHA v3を使って送信
    public function send(Request $request){
        // validate
    }

    public function destroy($id) {
        $Article = Article::findOrFail($id);
        $Article->delete();
        return redirect()->route('dashboard')->with('message', '記事を削除しました。');
    }
    // 編集
    // public function edit($id) {
    //     $article = Article::findOrfail($id);

    //     return view('articles.edit', compact('article'));
    // }

    // public function update(ArticleRequest $request, $id) {
    //     $article = Article::findOrFail($id);

    //     $article->update($request->validated());

    //     return redirect(url('dashboard', [$article->id]));
    // } 
}
