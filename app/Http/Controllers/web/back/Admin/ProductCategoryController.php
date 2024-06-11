<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('back.product.category.index');
    }

    public function create()
    {
        return view('back.product_category.create');
    }

   
}
