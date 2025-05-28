<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'leftover_id', 'reserved_at','amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leftover()
    {
        return $this->belongsTo(Leftover::class);
    }
    
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
