<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'article_id', 'comment'];

    protected $dates = ['published_at'];

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }
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
