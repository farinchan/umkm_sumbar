<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductViewer extends Model
{
    use HasFactory;

    protected $table = 'product_viewers';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
