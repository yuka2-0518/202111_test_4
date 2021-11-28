<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //? ➄3:24 *********************************************************
    protected $fillable = [
        'user_id','cat',
    ];
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

}
