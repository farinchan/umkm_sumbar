<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityAdmin extends Model
{
    use HasFactory;

    protected $table = 'city_admin';
    protected $fillable = ['city_id', 'user_id' ];
}
