<?php

namespace App\Http\Controllers;

use App\Models\Image;

class HomeController extends Controller
{
    public function index()
    {
        if (Request()->ajax()) {
            $images = Image::ApprovedImages()->with('user')->paginate(20);
            return response()->json($images);
        }
        return view('frontend.main');
    }
}
