<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
 
    public function articles() {
        // 第2引数は多対多の中間テーブル名を渡します。省略された場合は、モデル名をアルファベット順で並べた物が中間テーブル名となります
        // 中間テーブル名に規約から外れた物を指定したい時に、第2引数を指定します
        // この場合の中間テーブル名はarticle_tagとなります
        // 第3、第3キーは中間テーブルの外部キーを指定します。省略された場合は、モデル名_idが外部キーとなります
        // 外部キーに規約から外れた物を指定したい時に第3、第4キーを指定します
        // 中間テーブルのタイムスタンプを更新する為に、withTimestamps() を使用する必要があります。
        return $this->belongsToMany('App\Article')->withTimestamps();;
    }
}
