<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'combo_id',
        'dish_id',
        'quantity'
    ];

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
