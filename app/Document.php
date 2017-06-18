<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable=['user_id','name', 'location', 'emission_date'];

    function User()
    {
        return $this->belongsTo(User::class);
    }
}
