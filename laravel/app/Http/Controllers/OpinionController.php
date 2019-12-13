<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function show(){
        // ご意見ページへリダイレクト
        return redirect()->route('opinion');
    }

    // ご意見ご要望の投稿処理
    public function post(){
        //
    }
}
