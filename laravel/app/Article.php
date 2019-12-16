<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'published_at', 'image1', 'image2', 'image3', 'user_id', 'genre_id'];
    protected $dates = ['published_at']; // 日付ミューテータ

    // アクセサメソッド
    // public function getTitleAttribute($value)
    // {
    //     // 大文字に変換
    //     return mb_strtoupper($value);
    // }

    // ミューテータメソッド
    // public function setTitleAttribute($value)
    // {
    //     // 小文字に変換
    //     $this->attributes['title'] = mb_strtolower($value);
    // }

    //  published scopeを定義
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    // Userと関連付ける
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Tagと関連付ける
    public function tags()
    {
        // 中間テーブルのタイムスタンプを更新する為に、withTimestamps() を使用する必要があります。
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    // Genreモデルが親
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
    
    //commentに一対多の関係
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
