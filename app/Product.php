<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;

class Product extends Model
{
    protected $guarded = [];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
