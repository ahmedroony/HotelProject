<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
      protected $table = 'room_types';
    protected $fillable = [
        'name',
        'description',
        'price',
        'max_adults',
        'max_children',
    ];

    // The attributes that should be cast.
    
    protected $casts = [
        //'price' => 'float',
        'max_adults' => 'integer',
        'max_children' => 'integer',
    ];

     public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }
}
