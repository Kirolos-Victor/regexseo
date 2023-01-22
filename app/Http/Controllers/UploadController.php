<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImageRequest;
use App\Models\Image;
use App\Services\UploadImageService;
use Illuminate\View\View;

class UploadController extends Controller
{
    public function index(): View
    {
        return view('frontend.upload');
    }

    public function upload(UploadImageRequest $request)
    {
        $user = Auth()->user();
        $imageName = (new UploadImageService())->get($request);
        $data = $request->validated();
        $data['image'] = $imageName;
        if ($user != null) {
            $data['user_id'] = $user->id;
        }
        Image::create($data);
        session()->flash('success', 'You have uploaded an image successfully');
    }
}
