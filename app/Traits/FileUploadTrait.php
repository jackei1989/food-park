<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;
use phpDocumentor\Reflection\Types\Null_;

trait FileUploadTrait
{
    function uploadImage(Request $request, $inputName, $oldPath = null, $path = "/uploads")
    {
        if ($request->hasFile($inputName)) {

            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            /** Delete file if exists */
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            return $path . '/' . $imageName;
        }

        return NULL;
    }

    /**
     * Remove file
     */
    function removeImage(string $path): void
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
