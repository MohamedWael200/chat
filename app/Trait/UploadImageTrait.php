<?php

namespace App\Trait;

trait UploadImageTrait
{
    public function uploadImage($image,$folder) {
        $file_extenstion = $image->getClientOriginalExtension();
        $file_name = time().'.'.$file_extenstion;
        $path = $folder;
        $image->move($path,$file_name);
        return $file_name;
    }
}
