<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_detail';
    public $timestamps = false;
    protected  $guarded = [];
    protected $fillable = [
        'product_id',
        'product_img',
    ];


    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
