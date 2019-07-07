<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = "product";
    protected $guarded = [];
    protected $fillable = [
        'content',
        'product_img',
        'product_name'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\CategoryProduct', 'product_id');
    }

    public function detail()
    {
        return $this->hasOne('App\Models\ProductDetail')->withDefault();
    }
}
