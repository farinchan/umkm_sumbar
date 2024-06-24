<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function Catogories()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }
}
