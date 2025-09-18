<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_type extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
     
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
}
