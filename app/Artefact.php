<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artefact extends Model
{
    protected $fillable=['user_id','name', 'receive_date','description'];
    function User()
    {
        return $this->belongsTo(User::class);
    }
}
