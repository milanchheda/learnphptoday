<?php

namespace App\Console\Commands;

use App\VideoUrl;
use App\VideosData;
use Illuminate\Console\Command;

class fetchVideos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:videos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches youtube video details';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $allVideos = VideoUrl::orderBy('id', 'asc')->where('status', 0)->take(10)->get()->pluck('url', 'id')->toArray();
        $re = '/[0-9]+/';
        foreach ($allVideos as $key => $value) {
            $videoData = file_get_contents('https://www.youtube.com/oembed?url=' . $value . '&format=json');
            try {
                $videoObj = new VideosData();
                $videoObj->video_id = $key;
                $videoObj->data = $videoData;
                $videoObj->save();
                VideoUrl::where('id', $key)->update(array('status' => 1));
            } catch (\Exception $e) {
                // DB::rollback();
                echo $e->getMessage();
            }
        }
    }
}
