<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.list', compact('category'));    
    }

    public function create()
    {
        
        return view('admin.category.create');    
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250|unique:categories,name',
    'image' => 'nullable|image|max:2400', 
        ]);

        $image = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            //unique name
            $image = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/category', $image);
        }

        Category::create([
    'name' => $request->name,
    'slug' => Str::slug($request->name, '-'),
    'image' => $image,
]);

        return redirect()->route('category.index')->with('success', 'Data saved successfully!');
    }
}
