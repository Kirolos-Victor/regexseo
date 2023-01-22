<?php

namespace App\Services;

class UploadImageService
{
    public function get($request): string
    {
        $file = $request->file('image');
        $filename = time() . $file->getClientOriginalName();
        $file->storeAs('public/images', $filename);
        return $filename;
    }
}
