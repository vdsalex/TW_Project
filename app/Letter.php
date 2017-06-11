<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $fillable=['provider_id','provider'];
    function User()
    {
        return $this->belongsTo(User::class);
    }
}
