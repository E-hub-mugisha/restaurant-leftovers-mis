<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'available'];

    public function leftovers()
    {
        return $this->hasMany(Leftover::class);
    }
    public function feedbacks()
    {
        return $this->hasMany(MealFeedback::class);
    }
    public function buffets()
    {
        return $this->hasMany(Buffet::class);
    }
    public function reservations()
    {
        return $this->hasMany(MenuReservation::class);
    }
}
