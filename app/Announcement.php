<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $fillable = ['title', 'category', 'user_id','added_by'];

    public function user()
    {
        return $this->belongsTo('App\User', 'added_by');
    }
}
