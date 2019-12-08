<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class PagesController extends Controller
{
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
    public function store(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            'image' => [
                // 'required', // 必須
                'file', // アップロードされたファイルであること
                'image', // 画像ファイルであること
                'mimes:jpeg,jpg,png,gif', // MIMEタイプを指定
                // 最小縦横120px 最大縦横400px
                //'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
                'max:2048', // 最大サイズ2M
            ]
        ]);

        $image = new Image(); // Imageモデルのインスタンス生成、imagesテーブルを扱えるようにする

        // $uploadImg = $request->image; // "image"は<input type="file">のname属性の値
        // isValidメソッドはファイルが存在しているかに付け加え、問題なくアップロードできたのかを確認することができます
        // $request->imageは$request->file('image')でも良い
        // ここでのimageはformタグのname属性値
        if($request->image->isValid()) {
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
            $image->image = basename($request->image->store('public'));
        }
        $image->save(); // 変更を確定
        return redirect()->route('test');
    }
}
