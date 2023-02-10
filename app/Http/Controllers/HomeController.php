<?php

namespace App\Http\Controllers;

use App\Models\Image;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.main');
    }

    public function getImages()
    {
        $images = Image::ApprovedImages()->with('user')->paginate(20);
        return response()->json($images);
    }
}
