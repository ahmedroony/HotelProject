<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;//don`t forget this
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;//and this
    protected $fillable = ["first_name","last_name","email","phone","date_of_birth"];
}
