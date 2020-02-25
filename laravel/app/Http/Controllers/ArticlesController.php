<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Article;
// use App\Tag;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Fav;

// use Illuminate\Support\Facades\DB;
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
    // public function index()
    public function index()
    {
        // $articles = Article::all();

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
        // published_atを使わない

        //new コメントで表示するためのやつ
        $comments = Comment::latest()->get();

        $articles = Article::latest('created_at')->paginate(5, ["*"], 'home');
        $articles1 = Article::where('genre_id', '1')->latest('created_at')->paginate(5, ["*"], 'web'); // WEB
        $articles2 = Article::where('genre_id', '2')->latest('created_at')->paginate(5, ["*"], 'photo'); // 写真
        $articles3 = Article::where('genre_id', '3')->latest('created_at')->paginate(5, ["*"], 'video'); // 動画

        // return view('articles.index', compact('articles'));
        return view('articles.index', compact('articles', 'articles1', 'articles2', 'articles3', 'comments'));
    }

    // 引数で受け取ったidからデータベースの記事を取り出してshowビューに渡す
    public function show(Article $article)
    { // $id から $article へ変更
        // $article = Article::findOrFail($id);
        // 自動的にルートの {article} 部分に指定された id に一致する Article が $article 変数に渡されてきます
        // この機能をRoute Model Bindingという
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

    /*** 記事の追加 ***/
    // Requestファザードを使っていたがstoreメソッドの引数からIlluminate\Http\Request クラスのインスタンスを取得するようにしました
    // Laravel のコントローラはメソッドの引数にタイプヒントでクラスを記述すると、そのクラスのインスタンスを自動生成して渡してくれます。とてもクールです
    public function store(ArticleRequest $request)
    {
        // dd($request->all()); // デバッグ
        // recaptcha($request); // app/Http/helper.php

        // 画像はここでバリデート
        $request->validate([
            // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
            'file0' => 'file|image|mimes:jpeg,jpg,png,gif',
            'file1' => 'file|image|mimes:jpeg,jpg,png,gif',
            'file2' => 'file|image|mimes:jpeg,jpg,png,gif',
        ]);

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
        // create()によってレコードが追加されるので後にimageを格納していく
        $article = Auth::user()->articles()->create($request->validated());

        // リクエストで渡される tags を attach() メソッドでタグのリレーションに追加
        // $article->tags()->attach($request->input('tags'));

        // ここでimageを格納する処理
        // isValidメソッドはファイルが存在しているかに付け加え、問題なくアップロードできたのかを確認することができます
        // storeメソッドは、一意のIDをファイル名として生成します。ファイルの拡張子は、MIMEタイプの検査により決まります
        // storeメソッドからファイルパスが返されますので、生成されたファイル名を含めた、そのファイルパスをデータベースに保存できます
        // basename()はパスの最下層の名前を返す(拡張子含む)
        // if ($request->hasFile('image1')) {
        if ($request->file0) { // シンプルにnull値をチェックできる
            $article->image1 = basename($request->file0->store('public/uploaded_images'));
        }
        if ($request->file1) {
            $article->image2 = basename($request->file1->store('public/uploaded_images'));
        }
        if ($request->file2) {
            $article->image3 = basename($request->file2->store('public/uploaded_images'));
        }
        $article->save(); // updateにしないといけないかも

        // dd($request->image1, $request->image2, $request->image3); // デバッグ用(画像の送信確認)

        // return redirect('articles')->with('message', '記事を追加しました。'); // 記事一覧へリダイレクト
        return redirect()->route('articles.index')->with('message', '記事を追加しました。');
    }

    /*** 記事の編集 ***/
    public function edit(Article $article){ // $id から $article へ変更

        /* ユーザに編集の権限があるかチェック */
        // ログインしていない場合はコンストラクタのmiddleware('auth')によってログイン画面へ
        if ($article->user_id == Auth::user()->id) {
            // 編集の権限があれば編集画面へ
            return view('articles.edit', compact('article'));
        } else {
            // 編集の権限がない場合は記事一覧へ飛ばす(暫定)
            // 注意: with()に値をいれないとnullになってしまう
            return redirect()->route('articles.index')->with('message', '編集権限が無いよ!');
        }

    }

    // 記事の更新
    public function update(ArticleRequest $request, Article $article)
    { // $id から $article へ変更
        // $article = Article::findOrFail($id);
        $article->update($request->validated()); // Form Requestを用いる
        // リクエストで渡される tags を sync() メソッドで タグのリレーションに同期しています
        // sync() メソッドでは article_tag テーブルのデータが引数で渡された id の物だけになるように、追加と削除を行います
        // $article->tags()->sync($request->input('tags'));

        // return redirect(url('articles', [$article->id]))->with('message', '記事を更新しました。');
        return redirect()->route('articles.show', [$article->id])->with('message', '記事を更新しました。');
    }

    // 記事の削除
    public function destroy(Article $article)
    { // $id から $article へ変更
        // $id で記事を検索し、delete() メソッドで削除しています
        // $article = Article::findOrFail($id);

        // 画像の削除
        if ($article->image1) {
            Storage::disk('uploaded_images')->delete($article->image1);
        }
        if ($article->image2) {
            Storage::disk('uploaded_images')->delete($article->image2);
        }
        if ($article->image3) {
            Storage::disk('uploaded_images')->delete($article->image3);
        }
        // 記事レコードを削除
        $article->delete();

        // redirect() 時に with() メソッドでフラッシュ情報としてメッセージを追加します
        // フラッシュ情報とは次のリクエストだけで有効な一時的なセッション情報（サーバーに保存する情報）です
        return redirect()->route('articles.index')->with('message', '記事を削除しました。');
    }
    public function id()
    {
        return $this->hasOne('App\id');
    }

    //コメントのajax通信
    public function post_ajax()
    {
        $comment_data = filter_input(INPUT_POST, 'comment_data');
        // $article_id = filter_input(INPUT_POST, 'article_id');
        $user_id = Auth::User()->id;
        $article_id = filter_input(INPUT_POST, 'article_id');

        // DBに保存
        Comment::create([
            'comment' => $comment_data,
            'user_id' => $user_id,
            'article_id' => $article_id
        ]);
    }

    // public function comments()
    // {
    //     $comments = Comment::latest()->get();

    //     return view('articles.index', compact('comments'));
    // }

    public function favpost()
    { // いいね送信
        $article_id = filter_input(INPUT_POST, 'article_id'); // 受け取った記事ID
        $article = Article::find($article_id);
        $user_id = Auth::User()->id;
        if (Fav::where('user_id', $user_id)->where('article_id', $article_id)->exists()) { // データが存在していれば削除
            Fav::where('user_id', $user_id)->where('article_id', $article_id)->delete();
            $article->decrement('favs_count');
            echo ('レコード削除!');
        } else { // データの追加
            Fav::create([
                'user_id' => $user_id,
                'article_id' => $article_id
            ]);
            $article->increment('favs_count');
            echo ('レコード追加!');
        }
    }

    //avaterの変更機能
    // public function avater(Request $request)
    // {
    //     $request->validate([
    //         'avater' => 'file|image|mimes:jpeg,jpg,png,gif',
    //     ]);
    //     $avater = $request->avater;
    //     $user = User::find(Auth::user()->id);
    //     $user->avater = basename($avater->store('public/avaters')); //画像保存してavaterに名前を入れる
    //     $user->save();


    //     return redirect('dashboard');
    // }
}
