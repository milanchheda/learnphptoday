<?php

namespace App\Http\Controllers;

use App\VideoUrl;
use App\TweetsUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
                $youtubeUrlObj = new VideoUrl();
                $youtubeUrlObj->url = $request->input('url');
                $youtubeUrlObj->save();
                return redirect('admin/dashboard')->with('message', 'Successfully submitted!');
            } else if($request->input('url_type') == 'twitter'){
                $tweetsUrlObj = new TweetsUrl();
                $tweetsUrlObj->url = $request->input('url');
                $tweetsUrlObj->save();
                return redirect('admin/dashboard')->with('message', 'Successfully submitted!');
            }
        } catch(\Illuminate\Database\QueryException $e) {
            return redirect('admin/dashboard')->with('message', $e->getMessage());
        }
  	}
}
