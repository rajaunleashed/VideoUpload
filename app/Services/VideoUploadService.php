<?php


namespace App\Services;


class VideoUploadService
{
    public function upload($file)
    {
        $filenameWithExt= $file->getClientOriginalName();
        $filename = str_replace(' ', '-', pathinfo($filenameWithExt, PATHINFO_FILENAME));
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = $filename. '_'.time().'.'.$extension;
        $file->storeAs('public/videos',$fileNameToStore);
        $path = 'storage/videos/' . $fileNameToStore;
        return $path;
    }
}
