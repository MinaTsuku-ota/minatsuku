<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    // Articles テーブルのデータ全てを抽出し、ビューに渡す
    public function index() {
        $articles = Article::all();
 
        return view('articles.index', compact('articles'));
    }
    // とりあえず引数で受け取った $id を表示するのみ
    public function show($id) {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
}
