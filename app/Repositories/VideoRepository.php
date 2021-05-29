<?php


namespace App\Repositories;


use App\Models\Video;

class VideoRepository
{
    public function all()
    {
        return Video::latest()->get();
    }

    public function store($data)
    {
        $video               = new Video;
        $video->title        = $data['title'];
        $video->description  = $data['description'];
        $video->tags         = $data['tags'];
        $video->file_path    = $data['file_path'];
        $video->save();

        return $video;
    }
}
