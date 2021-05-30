<?php

namespace App\Http\Controllers;

use App\Http\Requests\Video;
use App\Jobs\ConvertionVideo;
use App\Repositories\VideoRepository;
use App\Services\VideoUploadService;
use FFMpeg\Format\Video\X264;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class VideoController extends Controller
{
    protected $videoService;
    protected $videoRepo;

    public function __construct(VideoUploadService $videoService, VideoRepository $videoRepository)
    {
        $this->videoService = $videoService;
        $this->videoRepo    = $videoRepository;
    }

    public function index()
    {
        $videos = $this->videoRepo->all();

        return view('videos.index', compact('videos'));
    }

    public function upload(Video $request)
    {
        try {

            $path = $this->videoService->upload($request->file('file'));
            $request->request->add(['file_path' => $path]);
            $video = $this->videoRepo->store($request->except('file'));

            ConvertionVideo::dispatch($video);
            session()->flash('success', 'Video uploaded successfully');
            return redirect()->to('videos');

        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

}
