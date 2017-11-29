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
                $objToSave = new VideoUrl();
            } else if($request->input('url_type') == 'twitter'){
                $objToSave = new TweetsUrl();
            }

            if(is_object($objToSave)) {
              $objToSave->url = $request->input('url');
              $objToSave->save();
              return redirect('admin/dashboard')->with('message', 'Successfully submitted!');
            } else {
              return redirect('admin/dashboard')->with('message', 'Incorrect object. Try again.');
            }
        } catch(\Illuminate\Database\QueryException $e) {
            return redirect('admin/dashboard')->with('message', $e->getMessage());
        }
  	}
}
