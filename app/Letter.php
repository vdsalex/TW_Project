<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $fillable=['user_id','sender', 'receiver', 'message', 'write_date'];
    function User()
    {
        return $this->belongsTo(User::class);
    }
}
