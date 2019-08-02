<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected  $table = "categories";
    protected $guarded = [];

    public function sub_category()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function up_category()
    {
        return $this->belongsTo(UpCategory::class, 'up_category_id');
    }

}
