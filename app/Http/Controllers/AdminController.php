<?php

namespace App\Http\Controllers;

use App\VideoUrl;
use App\TweetData;
use App\TweetsUrl;
use App\VideosData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{

  	public function index(Request $request)
  	{
    	$request->user()->authorizeRoles(['admin']);
    	return View::make('admin.dashboard');
  	}

  	public function store(Request $request) {
  		try {
            if($request->input('url_type') == 'youtube') {
                $objToSave = new VideoUrl();
            } else if($request->input('url_type') == 'twitter'){
                $objToSave = new TweetsUrl();
            } else if($request->input('url_type') == 'fetchTweetsAndVideos') {
              if($request->input('fetchTweets') !== null) {
                Artisan::call('fetch:tweets');
              } else if($request->input('fetchVideos') !== null) {
                Artisan::call('fetch:videos');
              }
              return redirect('admin/dashboard')->with('message', 'Successfully submitted!');
            }

            if(is_object($objToSave)) {
              $objToSave->url = $request->input('url');
              $objToSave->save();
              return redirect('admin/dashboard')->with('message', 'Successfully submitted!');
            } else {
              return redirect('admin/dashboard')->with('error', 'Incorrect object. Try again.');
            }
        } catch(\Illuminate\Database\QueryException $e) {
            return redirect('admin/dashboard')->with('error', $e->getMessage());
        }
  	}

    public function showTweets() {
      $allTweets = TweetsUrl::orderBy('id', 'desc')->simplePaginate(20);
      $allData = array('tweetData' => $allTweets);
      return View::make('admin.tweets')->with($allData);
    }

    public function showVideos() {
      $allVideos = VideoUrl::orderBy('id', 'desc')->simplePaginate(20);
      $allData = array('videoData' => $allVideos);
      return View::make('admin.videos')->with($allData);
    }

    public function deleteTweets($id) {
      try {
        $allTweets = TweetsUrl::findOrFail($id);
        $tweetsDataObj = TweetData::where('tweet_url_id', $id);
        if(!empty($tweetsDataObj))
          $tweetsDataObj->delete();
        $allTweets->delete();
        return redirect('admin/tweets')->with('message', 'Sucessfully deleted ' . $id);
      } catch(ModelNotFoundException $e) {
        return redirect('admin/tweets')->with('message', $e->getMessage());
      }
    }

    public function deleteVideos($id) {
      try {
        $allVideos = VideoUrl::findOrFail($id);
        $videoDataObj = VideosData::where('video_id', $id);
        if(!empty($videoDataObj))
          $videoDataObj->delete();
        $allVideos->delete();
        return redirect('admin/videos')->with('message', 'Sucessfully deleted ' . $id);
      } catch(ModelNotFoundException $e) {
        return redirect('admin/videos')->with('message', $e->getMessage());
      }
    }
}
