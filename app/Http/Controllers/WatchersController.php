<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use App\Watcher;

class WatchersController extends Controller
{

	// insert into watch table
	public function watch($id)
	{
		Watcher::create([
			'discussion_id' => $id,
			'user_id' => Auth::id()
		]);


		Session::flash('success', 'You are watching this discussion..');

		return redirect()->back();
	}

	// delete from  watcher table to unwatch the post
	public function unwatch($id)
	{
		$watcher = Watcher::where('discussion_id', $id)->where('user_id', Auth::id());

		$watcher->delete();

		Session::flash('success', 'You are unwatching the discussion');

		return redirect()->back();
	}
}
