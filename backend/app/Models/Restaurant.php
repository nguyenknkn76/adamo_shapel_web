<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Restaurant extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'description', 
        'image_url', 
        'open_time', 
        'close_time', 
        'rating',
    ];

    protected $hidden = [

    ];

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function combos()
    {
        return $this->hasMany(Combo::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
