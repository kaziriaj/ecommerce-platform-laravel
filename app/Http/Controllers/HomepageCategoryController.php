<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomepageCategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::with('products.images')->findOrFail($id);
        return view('frontend.category_product', compact('category'));
    }
}
