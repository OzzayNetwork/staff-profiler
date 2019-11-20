<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    protected $table='profile';
    //primary key
    public $primaryKey='id';
    //time stamps
    public $timestamps=true;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
