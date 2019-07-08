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
        'up_id',
        'images_url',
        'category_name'
    ];

    public function productss()
    {
        return $this->hasMany(CategoryProduct::class, 'category_id');
    }

    public function up_category()
    {
        return $this->belongsTo(Category::class, 'up_id')->withDefault([
            'category_name' => 'Ana Kategori'
        ]);
    }
}
