<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $fillable = ['body'];

    // User1人につき複数のOpinionを持つ
    public function user(){
        return $this->belongsTo('App\User');
    }
}
