<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopFollows extends Model
{
    use HasFactory;

    protected $table = 'shop_follows';
    protected $fillable = ['shop_id', 'user_id'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
