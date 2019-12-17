<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use lanazaca\CounterCache\CounterCache;

class fav extends Model
{
    use CounterCache;
    
    public $counterCacheOptions = [
        'Post' => [
            'field' => 'favs_count',
            'foreignKey' => 'article_id'
        ]
    ];

    protected $fillable = ['user_id', 'post_id'];
    
    public function article()
    {
        return $this->belongsTo('App\article');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
        //
}
