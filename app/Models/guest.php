<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;//don`t forget this
use Illuminate\Database\Eloquent\Model;


class Guest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
