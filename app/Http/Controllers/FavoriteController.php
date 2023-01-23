<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        if (Request()->ajax()) {
            $images = Auth()->user()->favoriteImages()->with('user')->latest()->paginate(12);
            return response()->json($images);
        }
        return view('frontend.favorites');
    }

    public function addToFavorite(Image $image)
    {
        $image->favorites()->toggle(Auth()->id());
    }
}
