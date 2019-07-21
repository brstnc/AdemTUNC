<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected  $table = "category";
    protected $guarded = [];
    protected $fillable = [
        'images_url',
        'category_name'
    ];

    public function products()
    {
        return $this->hasMany(CategoryProduct::class, 'category_id');
    }

    public function up_categories()
    {
        return $this->hasMany(Categories::class, 'sub_category_id');
    }
}
