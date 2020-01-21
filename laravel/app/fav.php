<?php
/*
 * 参考: Qiita - いいね機能実装してみた https://qiita.com/dai_designing/items/67a48e31d50899c6543f
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
// use kanazaca\CounterCache\CounterCache;

class fav extends Model
{
    // use CounterCache;
    
    // public $counterCacheOptions = [
    //     'article' => [
    //         'field' => 'favs_count',
    //         'foreignKey' => 'article_id'
    //     ]
    // ];

    protected $fillable = ['user_id', 'article_id'];
    
    public function article(){ // Articleは子
        return $this->belongsTo('App\Article');
    }
    public function user(){ // Userは子
        return $this->belongsTo('App\User');
    }
}
