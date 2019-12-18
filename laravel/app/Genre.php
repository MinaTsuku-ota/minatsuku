<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    // protected $fillable = ['genre'];

    // Articleモデルが子
    public function article(){
        return $this->hasMany('App\Article');
    }
}
