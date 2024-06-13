<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    use HasFactory;

    protected $table = 'shops';
    protected $fillable = [
        'id',
        'name',
        'logo',
        'email',
        'phone',
        'address',
        'latitude',
        'longitude',
        'logo',
        'description',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'telegram',
        'linkedin',
        'meta_description',
        'meta_keyword',
        'city_id',
        'user_id',
    ];
}
