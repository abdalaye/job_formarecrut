<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Info;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class UtilitiesController extends Controller
{
    static function uploadFile(UploadedFile $uploadFile, $folder,array $extensions = [], $randomName = "upload") {
        if($uploadFile->isValid() && in_array(strtolower($uploadFile->extension()), $extensions)) {
            // $filename = time() . Str::slug($randomName) . '.' . $uploadFile->extension();
            try {
                $file_path = $uploadFile->storePublicly($folder);
                if($file_path) return 'storage'.$file_path;
            } catch (\Throwable $th) {
                return false;
            }
        }

        return false;
    }


    static function storeFile(UploadedFile $uploadFile, $folder, $maxSize = null,array $extensions = [])
    {
        $ext = $uploadFile->extension();
        $filename = auth()->id() . '_' . time() . '.'. $ext;
        $size = $uploadFile->getSize();
        if($maxSize && $size > $maxSize) {
            return false;
        }
        if(count($extensions) && !in_array(strtolower($ext), $extensions)) {
            return false;
        }

        try {
            $file_path = $uploadFile->storePubliclyAs('public/'.$folder, $filename);
            if($file_path) return 'storage/'.$folder.'/'.$filename;
        } catch (\Throwable $th) {
            return false;
        }
    }

    static function removeFile($relativepath) {
        $file_path = public_path($relativepath);
        if($relativepath && file_exists($file_path)) {
            unlink($file_path);
        }
    }

}
