<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Validator;

class Profile extends Model {

	protected $fillable = [
		'name', 'location', 'bio', 'youtube_username', 'twitter_username',
		'instagram_username', 'facebook_page_name', 'vine_username'
	];


	public function user()
	{
		return $this->belongsTo('App\User');
	}
}