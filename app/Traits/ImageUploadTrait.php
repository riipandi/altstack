<?php

namespace App\Traits;

use Carbon\Carbon;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageUploadTrait
{
    // Resizes image using the InterventionImage package.
    protected function storeImageFile($file, $targetDirectoryName, $fileNameToStore, $resizeTo = 1200)
    {
        // Resize image before storing to directory.
        $resize = Image::make($file)->resize($resizeTo, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg');

        // Prepare qualified image name
        $image = md5($resize->__toString()) . 'jpg';

        // Put image to storage directory
        $save = Storage::put("{$targetDirectoryName}/{$fileNameToStore}", $resize->__toString());

        return ($save) ? true : false ;
    }

    // Rename uploaded image file name.
    protected function generateFileNameToStore($file)
    {
        // Get the original image extension
        $extension = $file->getClientOriginalExtension();

        // Get file path and set new file name
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filename = md5(Str::slug($filename, ''));
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        return $fileNameToStore;
    }
}
