<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Reply extends Model
{
    protected $fillable = ['content', 'user_id', 'discussion_id'];

    public function discussion() 
    {
        return $this->belongsTo('App\Discussion');
    }

    public function user() 
    {
        return $this->belongsTo('App\User');
		}
		
		public function likes()
		{
			return $this->hasMany('App\Like');
		}

		public function is_liked_by_auth_user()
		{
			$id = Auth::id();

			$likes = array();

			foreach($this->likes as $like):
				array_push($likes, $like->user_id);
			endforeach;

			if(in_array($id, $likes)) {
				return true;
			} else {
				return false;
			}
		}
}
