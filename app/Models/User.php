<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password'
    ];
    public function detail()
    {
        return $this->hasOne('App\Models\UserDetail')->withDefault();
    }
}
