<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'restaurant_name',
        'logo',
        'email',
        'phone',
        'address',
        'days_open',
        'opening_hours',
        'facebook',
        'instagram',
        'twitter',
        'about_us',
    ];
}
