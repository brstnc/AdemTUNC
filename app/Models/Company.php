<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company_detail';
    public $timestamps = false;
    protected  $guarded = [];
}
