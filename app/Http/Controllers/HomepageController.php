<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SlideShow;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $homeSilder = SlideShow::where('status', true)->get();
        $homeCategory = Category::where('status', 'active')->get();
        return view('frontend.index', compact('homeSilder', 'homeCategory'));
    }
}
