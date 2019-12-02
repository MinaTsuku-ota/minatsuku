<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'published_at'];
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
}
