<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Article;
// use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    // Articles テーブルのデータ全てを抽出し、ビューに渡す
    public function index(){
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }
    // 引数で受け取ったidからデータベースの記事を取り出してshowビューに渡す
    public function show($id){
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
    // createビューを表示するだけ
    public function create(){
        return view('articles.create');
    }
    // Requestファザードを使っていたがstoreメソッドの引数からIlluminate\Http\Request クラスのインスタンスを取得するようにしました
    // Laravel のコントローラはメソッドの引数にタイプヒントでクラスを記述すると、そのクラスのインスタンスを自動生成して渡してくれます。とてもクールです
    public function store(ArticleRequest $request){
        // フォームの入力値を取得
        // $inputs = \Request::all();
        // dd($inputs); // デバッグ： $inputs の内容確認
        // Article::create($inputs); // マスアサインメントを使って、記事をDBに作成

        // バリデーションルールの設定
        // $rules = [
        //     'title' => 'required|min:3',
        //     'body' => 'required',
        //     'published_at' => 'required|date',
        // ];
        // コントローラの validate() メソッドを実行
        // ここでエラーがあると、自動的に前の画面にリダイレクトしてくれます。これまたクールです
        // $validated = $this->validate($request, $rules);
        // Article::create($validated);

        // store メソッドで受け取るクラスを Illuminate\Http\Request から App\Http\Requests\ArticleRequest に変更
        // これだけで、今まで store メソッド内で行っていた、validate が不要になります。エラーがあった時の前画面へのリダイレクトも ArticleRequest が行ってくれます。コントローラがスリムになり、超クールです
        Article::create($request->validated());
        return redirect('articles'); // 記事一覧へリダイレクト
    }
}
