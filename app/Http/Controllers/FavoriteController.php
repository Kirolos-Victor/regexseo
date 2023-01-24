<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\JsonResponse;

class FavoriteController extends Controller
{
    public function index()
    {
        if (Request()->ajax()) {
            $images = Auth()->user()->favoriteImages()->with('user')->latest()->paginate(20);
            return response()->json($images);
        }
        return view('frontend.favorites');
    }

    public function addToFavorite(Image $image): JsonResponse
    {
        $image->favorites()->toggle(Auth()->id());
        $imageCount = $image->favorites()->count();
        return response()->json($imageCount);
    }
}
