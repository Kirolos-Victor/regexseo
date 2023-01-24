<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getImages()
    {
        if (Request()->ajax()) {
            $images = Image::NotApprovedImages()->paginate(12);
            return response()->json($images);
        }
        return view('admin.approve');
    }

    public function approveImage(Image $image): void
    {
        $image->update([
            'approved' => 1
        ]);
    }
}
