<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['room_id', 'checkin_date', 'checkout_date', 'adults', 'children'];

    public function room()
    {
        return $this->belongsTo(Room::class, 'assigned_room_id');
    }
}

