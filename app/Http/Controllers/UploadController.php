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
        $data['approved'] = 0;
        if ($user != null) {
            $data['user_id'] = $user->id;
            $data['approved'] = 1;
        }
        Image::create($data);
        if ($user != null) {
            session()->flash('success', 'The image is uploaded successfully on the home page.');
        } else {
            session()->flash(
                'success',
                'You have uploaded an image successfully, Please wait for the admin approve to appear on the home page!'
            );
        }
    }
}
