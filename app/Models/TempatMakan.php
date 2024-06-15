<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatMakan extends Model
{
    protected $table = 'warungmakan';
    protected $fillable = ['name', 'url_photo', 'description', 'price_range', 'location', 'address', 'type', 'url_menu', 'rating'];

    public function ratings()
    {
        return $this->hasMany(ProductsRating::class, 'warungmakan_id', 'id');
    }
}
