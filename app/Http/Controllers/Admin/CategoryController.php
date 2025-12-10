<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
            'status' => $request->status
        ]);

        return redirect()->route('category.index')->with('success', 'Caregory Created successfully!');
    }

    public function edit($slug)
    {
        $category= Category::where('slug', $slug)->firstOrFail();
        return view('admin.category.create', compact('category'));
    }

    public function update(Request $request, $slug)
    {
        // Find the category by slug
        $category = Category::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:250|unique:categories,name',
            'image' => 'nullable|image|max:2400',
            'status' => 'required|in:active,inactive'
        ]);

         // Handle image
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($category->image && Storage::exists('public/category/' . $category->image)) {
            Storage::delete('public/category/' . $category->image);
        }

        // Store new image
        $file = $request->file('image');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/category', $imageName);

        $category->image = $imageName;
    }

        // Update other fields
    $category->name = $request->name;
    $category->slug = Str::slug($request->name, '-');
    $category->status = $request->status;

    $category->save();

        return redirect()->route('category.index')->with('success', 'Category Updated successfully!');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
         // Delete image if exists
        if ($category->image && Storage::exists('public/category/' . $category->image)) {
            Storage::delete('public/category/' . $category->image);
        }

        // Delete the category
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
}
