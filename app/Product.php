<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','url','description','price','category_id'];


    public function category()
    {
        return $this->belongsTO(Category::class);
    }
}
