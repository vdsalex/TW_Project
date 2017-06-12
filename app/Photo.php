<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=['user_id', 'description', 'location', 'snap_date'];
    function User()
    {
        return $this->belongsTo(User::class);
    }
}
