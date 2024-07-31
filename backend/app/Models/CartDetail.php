<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'dish_id',
        'combo_id',
        'quantity',
        'price'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }
}

