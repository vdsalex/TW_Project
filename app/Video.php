<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=['user_id', 'title', 'description', 'record_date'];
    function User()
    {
        return $this->belongsTo(User::class);
    }
}
