<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImageRequest;
use App\Models\Image;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UploadController extends Controller
{
    public function index(): View
    {
        return view('frontend.upload');
    }

    public function upload(UploadImageRequest $request)
    {
        $imageName = (new UploadImageService())->get($request);
        $data = $request->validated();
        $data['image'] = $imageName;
        Image::create($data);
        session()->flash('success', 'You have uploaded an image successfully');
    }
}
