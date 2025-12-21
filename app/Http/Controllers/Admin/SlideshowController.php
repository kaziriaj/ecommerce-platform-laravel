<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SlideShow;
use Illuminate\Http\Request;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slideshow = SlideShow::latest()->get();
        return view('admin.webslider.list', compact('slideshow'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.webslider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'nullable|string|max:250',
            'title_1' => 'nullable|string|max:250',
            'title_2' => 'nullable|string|max:250',
            'sub' => 'nullable|string|max:250',
            'price' => 'nullable|numeric',
            'status' => 'nullable|numeric',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

         $slideName = null;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $slideName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/slideshow', $slideName);
        }

        SlideShow::create([
            'category' => $request->category,
            'title_1' => $request->title_1,
            'title_2' => $request->title_2,
            'sub' => $request->sub,
            'price' => $request->price,
            'status' => $request->status,
            'photo' => $slideName
        ]);

        return redirect()->back()->with('success', 'Slideshow Created Successfully');

      // dd( $request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slideshow = SlideShow::findOrFail($id);
        return view('admin.webslider.create', compact('slideshow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
