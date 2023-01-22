<?php

namespace App\Http\Controllers;

use App\Models\Image;

class HomeController extends Controller
{
    public function index()
    {
        if (Request()->ajax()) {
            $images = Image::latest()->paginate(12);
            return response()->json($images);
        }
        return view('frontend.main');
    }
}
