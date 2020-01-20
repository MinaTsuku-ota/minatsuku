<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'password', 'subject_id', 'avater'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // Articleと関連付ける
    public function articles() {
        return $this->hasMany('App\Article');
    }
    // Subjectが親
    public function subject() {
        return $this->belongsTo('App\Subject');
    }
    // テーブルcommentに対して一対多の関係
    public function comments() {
        return $this->belongsTo('App\Comment');
    }
    public function favs() {
        return $this->hasMany(fav::class);
    }
    // Userは複数のOpinionを持つ
    public function opinions() {
        return $this->hasMany('App\Opinion');
    }
}
