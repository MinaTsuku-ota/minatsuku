<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
