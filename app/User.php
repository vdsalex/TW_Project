<?php

namespace App;

use Arubacao\Friends\Traits\Friendable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use Friendable;

    protected $fillable = ['username','password','first_name','last_name','email','address','gender'];

    public function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function letters()
    {
        return $this->hasMany(Letter::class);
    }

    public function artefacts()
    {
        return $this->hasMany(Artefact::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
