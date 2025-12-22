<?php

namespace App\Http\Controllers;

use App\Models\WebsitePopup;
use Illuminate\Http\Request;

class WebsitePopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popups = WebsitePopup::latest()->get();

        return view('admin.popup.list', compact('popups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.popup.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'name' => 'required',
            'short_description' => 'nullable',
            'image' => 'nullable',
            'status' => 'required',
        ]);
        $image = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = time() . '-' . $file->getClientOriginalExtension();
            $file->storeAs('public/website/popup', $image);
        }

        WebsitePopup::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'image' => $image,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Website Popup created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showPopup = WebsitePopup::all();
        return view('frontend.components.newsletter-popup', compact('showPopup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $popups = WebsitePopup::FindOrfail($id);
        return view('admin.popup.create', compact('popups'));
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
