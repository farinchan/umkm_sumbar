<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $fillable = ['name', 'slug', 'postal_code', 'status', 'status'];

    public function shop()
    {
        return $this->hasMany(Shop::class);
    }
    
}
