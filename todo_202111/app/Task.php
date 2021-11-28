<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //何を保存できるようにするかを指定
    protected $fillable = [
        'user_id', 'category_id', 'cat', 'task', 'duedate', 'prio', 'flag', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
