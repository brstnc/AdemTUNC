<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected  $table = "categories";
    protected $guarded = [];

    public function sub_categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function up_categories()
    {
        return $this->belongsTo(UpCategory::class, 'up_category_id');
    }

}
