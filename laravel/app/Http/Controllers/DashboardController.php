<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;
use App\User;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($array = null, Request $request)
    {

        // $articlesはarticlesテーブルのレコードが配列で格納される
        // 後にビューでforeach文でアクセスするなどして扱う
        // $articles = Article::where('user_id', Auth::user()->id)->latest('created_at')->get();
        $user = $request->input('user_id'); //dashboardに表示するユーザーのIDを取得
        if ($user === null) {
            //マイページから飛んできた場合の処理
            $user_id = Article::where('user_id', Auth::user()->id)->latest('created_at')->get();
            $id = Auth::user()->id;
        } else {
            //index.bladeから飛んできた場合の処理
            $user_id = Article::where('user_id', $user)->latest('created_at')->get(); //ループさせないと使えないっぽい
            $id = User::find($user)->id;
        }

        $fav_count = $user_id->sum('favs_count'); // いいね数を格納する変数

        return view('dashboard', compact('user_id', 'id', 'fav_count', 'array'));
    }

    // google reCAPTCHA v3を使って送信
    public function post(Request $request)
    {
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
    // サムネイルの更新
    public function update(Request $request)
    {
        // dd($request->all()); // デバッグ

        // バリデーション
        $request->validate([
            // 'file|image|mimes:jpeg,jpg,png,gif|max:2048' などなど
            'avater' => 'file|image|mimes:jpeg,jpg,png,gif',
        ]);

        // avaterが送信されているかチェック
        if ($request->avater) {
            // 新サムネイルをstorageに保存
            $avater = basename($request->avater->store('public/avaters'));
            // default_avater.pngは消さない
            if (Auth::user()->avater != "default_avater.png") {
                // 旧サムネイルをstorageから削除
                Storage::disk('avaters')->delete(Auth::user()->avater);
            }
            // 新サムネイルをユーザデータに反映
            User::where('id', Auth::user()->id)->update(['avater' => $avater]);
            return redirect()->route('dashboard.index')->with('message', 'プロフィール画像を更新しました！');
        }
        return redirect()->route('dashboard.index')->with('message', '更新失敗です!!');
    }
}
