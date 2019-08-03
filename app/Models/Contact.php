<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected  $table = "contact";
    protected $guarded = [];
    protected $fillable = [
        'name',
        'last_name',
        'company_name',
        'email',
        'address',
        'phone',
        'subject',
        'message'
    ];
}
