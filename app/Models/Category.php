<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','id'];

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class, 'category_sub_categories');
    }
}