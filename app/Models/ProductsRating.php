<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsRating extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rating', 'review', 'warungmakan_id'];
}
