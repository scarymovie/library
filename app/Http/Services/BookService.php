<?php

namespace App\Http\Services;

class BookService
{
    public function uploadImage($request)
    {
        if ($request->cover){
            $image = $request->cover;
            $image = $image->store('public/covers');
            $image = str_replace('public/', '', $image);
        } else {
            return null;
        }

        return $image;
    }
}
