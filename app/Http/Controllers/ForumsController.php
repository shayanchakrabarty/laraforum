<?php

namespace App\Http\Controllers;
use App\Discussion;
use App\Channel;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class ForumsController extends Controller
{
	public function index() 
	{
		//$discussion = Discussion::orderBy('created_at', 'desc')->paginate(3);
		//$dis = [];
	//	$dis['discussion'] = json_decode(json_encode($discussion));
		//print_r($dis);
		switch (request('filter')) {
			case 'me':
				$results = Discussion::where('user_id', Auth::id())->paginate(3);
				break;

			case 'solved':
				$anwered = array();

				foreach(Discussion::all() as $d) {
					
					if($d->hasBestAnswer()) {
						array_push($anwered, $d);
					}
				}
	
				$results = new Paginator($anwered, 3);
				break;
			
				case 'unsolved':
				$unanwered = array();

				foreach(Discussion::all() as $d) {
					
					if(!$d->hasBestAnswer()) {
						array_push($unanwered, $d);
					}
				}
	
				$results = new Paginator($unanwered, 3);
				break;
			
			default:
				$results = Discussion::orderBy('created_at', 'desc')->paginate(3);
				break;
		}


		return view('forum', ['discussions' => $results]);
		//return view('forum', ['discussions' => $discussion]);

	}

	public function channel($slug) 
	{
		$channel = Channel::where('slug', $slug)->first();
		//print_r($channel);

		return view('channel')->with('discussions', $channel->discussions);
	}


}
