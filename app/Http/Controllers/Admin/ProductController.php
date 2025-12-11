<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.product.list', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name'            => 'required|string|max:255',
        'short_details'   => 'nullable|string',
        'price'           => 'required|numeric|min:0',
        'discount_price'  => 'nullable|numeric|min:0|lt:price',
        'stock'           => 'required|integer|min:0',
        'description'     => 'nullable|string',
        'category_id'     => 'required|exists:categories,id',
        'status'          => 'required|in:active,inactive',
        'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'images.*'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // =====================
    // SINGLE IMAGE UPLOAD
    // =====================

    $imageName = null;

    if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('public/products', $imageName);
    }

    // =====================
    // CREATE PRODUCT FIRST
    // =====================

    $product = Product::create([
        'name'          => $request->name,
        'slug'          => Str::slug($request->name, '-'),
        'short_details' => $request->short_details,
        'price'         => $request->price,
        'discount_price'=> $request->discount_price,
        'stock'         => $request->stock,
        'description'   => $request->description,
        'category_id'   => $request->category_id,
        'status'        => $request->status,
        'image'         => $imageName,
    ]);

    // =====================
    // MULTIPLE IMAGES UPLOAD
    // =====================

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $i => $imgFile) {
            $multiName = time() . '_' . $i . '.' . $imgFile->getClientOriginalExtension();

            $imgFile->storeAs('public/products', $multiName);

            // Save into product_images table
            ProductImage::create([
                'product_id' => $product->id,
                'image'      => $multiName,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Product Created Successfully');
}


    public function edit($slug)
    {
        $categories = Category::all();
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('admin.product.create', compact('product', 'categories'));
    }
public function update(Request $request, $slug)
{
    // Find the category by slug
        $product = Product::where('slug', $slug)->firstOrFail();

    $request->validate([
        'name'            => 'required|string|max:255',
        'short_details'   => 'nullable|string',
        'price'           => 'required|numeric|min:0',
        'discount_price'  => 'nullable|numeric|min:0|lt:price',
        'stock'           => 'required|integer|min:0',
        'description'     => 'nullable|string',
        'category_id'     => 'required|exists:categories,id',
        'status'          => 'required|in:active,inactive',
        'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'images.*'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // =========================
    // MAIN IMAGE
    // =========================
    $imageName = $product->image; // keep old image by default

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '.' . $file->getClientOriginalExtension();

        // Delete old image if exists
        if ($product->image && file_exists(storage_path('app/public/products/' . $product->image))) {
            unlink(storage_path('app/public/products/' . $product->image));
        }

        $file->storeAs('public/products', $imageName);
    }

    // =========================
    // MULTIPLE IMAGES
    // =========================
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $index => $imageFile) {
            $multiName = time() . '_' . $index . '.' . $imageFile->getClientOriginalExtension();

            $imageFile->storeAs('public/products', $multiName);

            ProductImage::create([
                'product_id' => $product->id,
                'image'      => $multiName,
            ]);
        }
    }

    // =========================
    // UPDATE PRODUCT
    // =========================
    $product->update([
        'name'          => $request->name,
        'slug'          => Str::slug($request->slug, '-'),
        'short_details' => $request->short_details,
        'price'         => $request->price,
        'discount_price'=> $request->discount_price,
        'stock'         => $request->stock,
        'description'   => $request->description,
        'category_id'   => $request->category_id,
        'status'        => $request->status,
        'image'         => $imageName,
    ]);

    return redirect()->route('product.index')->with('success', 'Product updated successfully!');
}


    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Soft delete the product
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product moved to trash!');
    }

    public function forceDelete($slug)
{
    $product = Product::withTrashed()->where('slug', $slug)->firstOrFail();

    // Delete main image
    if ($product->image && Storage::disk('public')->exists('products/' . $product->image)) {
        Storage::disk('public')->delete('products/' . $product->image);
    }

    // Delete multiple images
    foreach ($product->images as $img) {
        if (Storage::disk('public')->exists('products/' . $img->image)) {
            Storage::disk('public')->delete('products/' . $img->image);
        }
        $img->delete(); // remove record
    }

    // Force delete product from DB
    $product->forceDelete();

    return redirect()->route('product.index')->with('success', 'Product permanently deleted!');
}

    public function restore($slug)
    {
        $product = Product::withTrashed()->where('slug', $slug)->firstOrFail();
        $product->restore();

        return redirect()->route('product.index')->with('success', 'Product restored successfully!');
    }

}
