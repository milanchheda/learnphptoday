<?php

namespace App\Http\Controllers;

use App\TweetData;
use App\VideosData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allVideos = VideosData::orderBy('id', 'asc')->take(4)->get()->toArray();
        $allTweets = TweetData::orderBy('id', 'asc')->take(3)->get()->toArray();
        $allData = array('videoData' => $allVideos, 'tweetData' => $allTweets);
        return view('welcome')->with($allData);
    }

    public function fetchVideos() {
        $allVideos = VideosData::orderBy('id', 'asc')->simplePaginate(12);
        $allData = array('videoData' => $allVideos);
        return view('videos')->with($allData);
    }

    public function fetchTweets() {
        $allTweets = TweetData::orderBy('id', 'asc')->simplePaginate(12);
        $allData = array('tweetData' => $allTweets);
        return view('tweets')->with($allData);
    }
}
