<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;

class PagesController extends Controller
{
    // ミドルウェアの設定
    public function __construct()
    {
        // indexとshowビュー以外にauthを適用
        // auth:ログインしていなかったらloginビューへリダイレクト
        $this->middleware('auth');
    }

    public function about(){
        // 配列に値をセット
        // $data = [];
        // $data["first_name"] = "Luke";
        // $data["last_name"] = "Skywalker";

        // view関数の第2引数に配列を渡すことで、viewに変数を渡すことができる
        // return view('pages.about', $data); // about.blade.phpの表示

        // 変数に値をセット
        $first_name = "Luke";
        $last_name = "Skywalker";
        // compact関数は変数から配列を生成してくれる
        return view('pages.about', compact('first_name', 'last_name'));
    }
    public function contact(){
         return view("pages.contact");  // contact.blade.phpの表示
    }

    // テスト用ビューの表示
    public function test(){
        // $imagesはimagesテーブルのレコードが配列で格納される
        // 後にビューでforeach文でアクセスするなどして扱う
        $images = Image::all();
        return view('test', compact('images'));
    }

    // 画像が送られたときの処理
    public function post(Request $request)
    {
        // バリデーション
        // $this->validate($request, [
        //     'image' => [
        //         // 'required', // 必須
        //         'file', // アップロードされたファイルであること
        //         'image', // 画像ファイルであること
        //         'mimes:jpeg,jpg,png,gif', // MIMEタイプを指定
        //         // 最小縦横120px 最大縦横400px
        //         //'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
        //         'max:2048', // 最大サイズ2M
        //     ]
        // ]);

        $this->validate($request, [
            'text' => 'required',
        ]);

        $response = recaptcha($request); // helper.php参照
        if ($response->getScore() < 0.6) {
            return response()->view('test', ['status' => false]);
        }
        return response()->view('test', [
            'status' => true,
            'score' => $response->getScore(),
            ]);


        // $image = new Image(); // Imageモデルのインスタンス生成、imagesテーブルを扱えるようにする

        // $uploadImg = $request->image; // "image"は<input type="file">のname属性の値
        // isValidメソッドはファイルが存在しているかに付け加え、問題なくアップロードできたのかを確認することができます
        // $request->imageは$request->file('image')でも良い
        // ここでのimageはformタグのname属性値
        // if($request->image->isValid()) {
            // storeメソッドは、一意のIDをファイル名として生成します
            // ファイルの拡張子は、MIMEタイプの検査により決まります
            // storeメソッドからファイルパスが返されますので、生成されたファイル名を含めた、そのファイルパスをデータベースに保存できます
            // $filePath = $request->file('image')->store('public');
            // 上の例と同じ操作を行うため、StrorageファサードのputFileメソッドを呼び出すこともできます。
            // $filePath = Storage::putFile('public', $uploadImg);
            // 保存ファイルが自動的に命名されたくなければ、ファイルパスとファイル名、（任意で）ディスクを引数に持つstoreAsメソッドを使ってください

            // "$image"はImageモデルのインスタンス、"image"はimagesテーブルのimageカラムのこと。
            // $filepathは"public/XXXXX.png"のような文字列なので"public/"を消してテーブルに保存する
            // $image->image = str_replace('public/', '', $filePath);

            // 上を1行で
            // $image->image = str_replace('public/', '', $request->image->store('public'));

            // basename()でも良い。パスの最下層の名前を返す(拡張子含む)
        //     $image->image = basename($request->image->store('public'));
        // }
        // $image->save(); // 変更を確定
        // return redirect()->route('test');
    }

    // ajaxテスト用
    public function ajaxtest(){
        // ajaxtestフォルダのajaxtest.blade.php
        return view('ajaxtest.ajaxtest');
    }

    // ajaxテスト用(ボタンクリックGET)
    public function ajaxtest_get(){
        return view('ajaxtest.sample');
    }

    // ドラッグアンドドロップテスト用
    public function ddtest(){
        $this->middleware('auth');
        return view('test_dd.ddtest');
    }

    // ドラッグアンドドロップテスト用(送信)
    public function ddtest_post(ArticleRequest $request){
        recaptcha($request); // app/Http/helper.php

        // 画像はここでバリデート
        $request->validate([
            'image1' => 'file|image',
            'image2' => 'file|image',
            'image3' => 'file|image',
        ]);

        $article = Auth::user()->articles()->create($request->validated());

        if ($request->image) {
            $article->image1 = basename($request->image->store('public/uploaded_images'));
        }
        $article->save();

        dd($request->image); // デバッグ(画像の送信確認)
        return redirect()->route('articles.index')->with('message', '送信完了(ﾟДﾟ)');
    }
}
