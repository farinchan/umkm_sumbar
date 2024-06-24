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
        return $this->hasMany(Product::class, 'product_categories_id', 'id');
    }

    public function subcategories()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }
}
