<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'price', 'user_id', 'category_id', 'long_description', 'additional_information', 'slug'
    ];

    /**
     * Get the user that added the product.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
