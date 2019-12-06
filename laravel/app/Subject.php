<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject'];
    // Userモデルが子
    public function users(){
        return $this->hasMany('App\User');
    }
}
