<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.list');    
    }

    public function create()
    {
        
        return view('admin.category.create');    
    }

    public function store()
    {
        return redirect()->route('category.index')->with('success', 'Data saved successfully!');
    }
}
