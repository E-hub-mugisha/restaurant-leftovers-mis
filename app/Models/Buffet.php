<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buffet extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'is_available', 'menu_id','image'];

    protected $casts = [
        'is_available' => 'boolean',
    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
