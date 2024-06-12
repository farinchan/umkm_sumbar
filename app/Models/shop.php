<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    use HasFactory;

    protected $table = 'shops';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
