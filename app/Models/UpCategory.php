<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpCategory extends Model
{
    protected  $table = "upcategory";
    protected $guarded = [];
    protected $fillable = [
        'images_url',
        'category_name'
    ];

    public function sub_categories()
    {
        return $this->hasMany(Categories::class, 'up_category_id');
    }
}
