<?php

namespace App\Traits;
use App\Http\Controllers\CompressController;
use Illuminate\Support\Facades\File;

/**
 *
 */
trait ImageHandler
{
    protected function compress_and_store($original)
    {
        $filenamewithextension = $original->getClientOriginalName();
        $extension = $original->getClientOriginalExtension();
        $original->move('copy', $filenamewithextension);
        $file = "copy/" . $filenamewithextension; //file that you wanna compress
        $new_name_image = time(); //name of new file compressed
        $quality = 60; // Value that I chose
        $pngQuality = 9; // Exclusive for PNG files
        $destination = 'storage/'; //This destination must be exist on your project
        $image_compress = new CompressController($file, $new_name_image, $quality, $pngQuality, $destination);
        $image_compress->compress_image();
        File::delete($file);
        $new_file = $new_name_image . '.' . $extension;
        return $new_file;
    }
}
