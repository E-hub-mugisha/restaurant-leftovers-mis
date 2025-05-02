<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leftover extends Model
{
    use HasFactory;
    protected $fillable = ['menu_id', 'quantity', 'discount', 'pickup_by', 'status'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
