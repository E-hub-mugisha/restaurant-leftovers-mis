<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'menu_id',
        'date',
        'time',
        'guests',
        'message',
        'status',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
