<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'category_id',
        'name',
        'description',
        'price',
        'image_url',
        'status'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comboDetails()
    {
        return $this->hasMany(ComboDetail::class);
    }

    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

