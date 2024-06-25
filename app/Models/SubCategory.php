<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name','id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_sub_categories');
    }
}