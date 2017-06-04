<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = ['username','password','first_name','last_name','email','address'];

    public function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }
}
