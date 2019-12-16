<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $dates = ['published_at'];
    //テーブルarticleに対して一対多の関係
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
    //テーブルusersに対して一対多の関係
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}