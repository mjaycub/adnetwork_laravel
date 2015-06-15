<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Validator;
use \App\Role as Role;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	public static $rules = [
		'fname' => 'alpha|required',
		'lname' => 'alpha|required',
		'username' => 'unique:users', 
		'company' => 'unique:users',
		'email' => 'required|unique:users',
		'password' => 'required|confirmed'
		];

	public static $errors;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['fname', 'lname', 'company', 'username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public static function isValid($data)
	{
		$validation = Validator::make($data, static::$rules);

		if($validation->passes())
		{
			return true;
		}

		static::$errors = $validation->messages();
		return false;
	}

	public function profile()
	{
		return $this->hasOne('App\Profile');
	}

	public function roles()
	{
		return $this->belongsToMany('App\Role');
	}

	public function removeRole($role)
	{
		return $this->roles()->detach($role);
	}

	public function assignRole($role)
	{
		return $this->roles()->attach($role);
	}

	public function listRoles()
	{
		$roles = '';
		foreach($this->roles as $role)
		{
			$roles = $role->name . ', ' . $roles;
		}
		return $roles;
	}

	# takes a string as parameter, eg: "owner", "administrator"
	public function hasRole($name)
	{
		foreach($this->roles as $role)
		{
			if($role->name == $name)
			{
				return true;
			}
		}
		return false;
	}

}
