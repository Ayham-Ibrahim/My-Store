<?php

namespace App\Traits;


use Illuminate\Http\Request;

trait ProductPhotoTrait
{
    public function storeProductPhoto(Request $request, $folderName)
    {
        $image = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs($folderName,$image,'product_img');
        return $path;
    }


}

