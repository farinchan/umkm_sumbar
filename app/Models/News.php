<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_categories_id ', 'id');
    }

    public function comments()
    {
        return $this->hasMany(NewsComment::class, 'news_id', 'id');
    }

    public function viewers()
    {
        return $this->hasMany(NewsViewer::class, 'news_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
