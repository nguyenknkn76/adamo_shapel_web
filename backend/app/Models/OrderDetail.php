<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'dish_id',
        'combo_id',
        'voucher_id',
        'quantity',
        'price',
        'note'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
