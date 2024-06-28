<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_categories_id');
    }

    public function shop()
    {
        return $this->belongsTo(shop::class, 'shop_id');
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function productReview()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function productViewer()
    {
        return $this->hasMany(ProductViewer::class, 'product_id');
    }
}
