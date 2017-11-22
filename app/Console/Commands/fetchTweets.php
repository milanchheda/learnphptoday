<?php

namespace App\Console\Commands;

use Twitter;
use App\TweetData;
use App\TweetsUrl;
use Illuminate\Console\Command;

class fetchTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:tweets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all tweet details.';

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
        $allTweets = TweetsUrl::orderBy('id', 'asc')->take(10)->get()->pluck('url', 'id')->toArray();
        $re = '/[0-9]+/';
        foreach ($allTweets as $key => $value) {
            preg_match_all($re, $value, $tweetID);
            $twitterObj = Twitter::getTweet($tweetID[0][0], ['tweet_mode' => 'extended']);
            $tweetArray = [
                'image_url' => isset($twitterObj->entities->media[0]) ? $twitterObj->entities->media[0]->media_url_https : '',
                'text' => $twitterObj->full_text,
                'name' => $twitterObj->user->name,
                'screen_name' => $twitterObj->user->screen_name,
                'profile_image' => $twitterObj->user->profile_image_url_https,
                'created_at' => $twitterObj->created_at,
            ];
            try {
                $tweetObj = new TweetData();
                $tweetObj->tweet_url_id = $key;
                $tweetObj->data = json_encode($tweetArray);
                $tweetObj->save();
                TweetsUrl::where('id', $key)->update(array('status' => 1));
            } catch (\Exception $e) {
                // DB::rollback();
                echo $e->getMessage();
            }
        }
    }
}
