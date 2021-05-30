<?php

namespace App\Jobs;

use App\Models\Video;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ConvertionVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $video;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
//            $lowBitrate = (new X264())->setKiloBitrate(250);
//            $midBitrate = (new X264())->setKiloBitrate(500);
//            $highBitrate = (new X264())->setKiloBitrate(1000);
//
//            $filepath = explode('/', $this->video->full_path);
//            $filename = $filepath[count($filepath) - 1];
//            $filename = explode('.', $filename)[0];
//
//            FFMpeg::fromDisk('public')
//                ->open($this->video->full_path)
//                ->exportForHLS()
//                ->addFormat($lowBitrate)
//                ->addFormat($midBitrate)
//                ->addFormat($highBitrate)
//                ->save($filename . '.m3u8');

            $this->video->conversion_status = 1;
            $this->video->save();

        } catch (\Exception $exception)
        {

        }
    }
}
