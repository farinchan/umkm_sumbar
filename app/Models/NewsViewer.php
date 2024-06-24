<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsViewer extends Model
{
    use HasFactory;

    protected $table = 'news_viewers';
    protected $guarded = [];
    
}
