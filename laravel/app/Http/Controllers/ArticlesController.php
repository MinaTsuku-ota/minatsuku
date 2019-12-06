<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Article;
use App\Tag;
// use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    // ミドルウェアの設定
    public function __construct()
    {
        // indexとshowビュー以外にauthを適用
        // auth:ログインしていなかったらloginビューへリダイレクト
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Articles テーブルのデータ全てを抽出し、ビューに渡す
    public function index()
    {
        $articles = Article::all();

        // こちらでも良い
        // $articles = Article::orderBy('published_at', 'desc')->orderBy('created_at', 'desc')->get();
        // latest()->get() に変更して、作成日の降順に記事をソート
        // orderBy()->get() を使っても同様のことが出来る
        // $articles = Article::latest('published_at')->latest('created_at')
        // ->where('published_at', '<=', Carbon::now()) // 公開日が現在時刻以前の記事だけを取得
        // ->get();
        // $articles = Article::latest('published_at')->latest('created_at')
        // ->published() // whereをscopeに差し替えた(Articleモデルを参照)
        // ->get();
        // return view('articles.index', compact('articles'));
        return view('articles.index', compact('articles'));
    }

    // 引数で受け取ったidからデータベースの記事を取り出してshowビューに渡す
    public function show(Article $article)
    { // $id から $article へ変更
        // $article = Article::findOrFail($id);
        // 自動的にルートの {article} 部分に指定された id に一致する Article が $article 変数に渡されてきます
        // この機能をRoute Model Bindeingという
        // ルートの {article} パラメータとコントローラの $article 引数は名前を合わせておく必要があります
        return view('articles.show', compact('article'));
    }

    // createビューを表示するだけ
    public function create()
    {
        // pluckメソッドは指定したキーの全コレクション値を配列で取得
        // タグ名と id の一覧を View に渡す
        // $tag_list = Tag::pluck('name', 'id');
        // return view('articles.create', compact('tag_list'));
        return view('articles.create');
    }

    // Requestファザードを使っていたがstoreメソッドの引数からIlluminate\Http\Request クラスのインスタンスを取得するようにしました
    // Laravel のコントローラはメソッドの引数にタイプヒントでクラスを記述すると、そのクラスのインスタンスを自動生成して渡してくれます。とてもクールです
    public function store(ArticleRequest $request)
    {
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
        // Article::create($request->validated());

        // 新規の記事を、ログイン中のユーザーの記事として保存するよう修正
        // Auth::user()->articles()->create($request->validated());
        $article = Auth::user()->articles()->create($request->validated());
        // リクエストで渡される tags を attach() メソッドでタグのリレーションに追加
        $article->tags()->attach($request->input('tags'));

        // return redirect('articles')->with('message', '記事を追加しました。'); // 記事一覧へリダイレクト
        return redirect()->route('articles.index')->with('message', '記事を追加しました。');
    }

    // 記事の編集
    public function edit(Article $article)
    { // $id から $article へ変更
        // $article = Article::findOrFail($id);
        // タグ名と id の一覧を View に渡す
        $tag_list = Tag::pluck('name', 'id');
        return view('articles.edit', compact('article, tag_list'));
    }

    // 記事の更新
    public function update(ArticleRequest $request, Article $article)
    { // $id から $article へ変更
        // $article = Article::findOrFail($id);
        $article->update($request->validated()); // Form Requestを用いる
        // リクエストで渡される tags を sync() メソッドで タグのリレーションに同期しています
        // sync() メソッドでは article_tag テーブルのデータが引数で渡された id の物だけになるように、追加と削除を行います
        $article->tags()->sync($request->input('tags'));

        // return redirect(url('articles', [$article->id]))->with('message', '記事を更新しました。');
        return redirect()->route('articles.show', [$article->id])->with('message', '記事を更新しました。');
    }

    // 記事の削除
    public function destroy(Article $article)
    { // $id から $article へ変更
        // $id で記事を検索し、delete() メソッドで削除しています
        // $article = Article::findOrFail($id);
        $article->delete();
        // redirect() 時に with() メソッドでフラッシュ情報としてメッセージを追加します
        // フラッシュ情報とは次のリクエストだけで有効な一時的なセッション情報（サーバーに保存する情報）です
        return redirect()->route('articles.index')->with('message', '記事を削除しました。');
    }
    public function id()
    {
        return $this->hasOne('App\id');
    }
}
