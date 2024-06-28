<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    
    public function ShopFollows()
    {
        return $this->hasMany(ShopFollows::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    
}
