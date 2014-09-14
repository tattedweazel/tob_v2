<?php namespace Tob\Users;


use Tob\Users\Events\UserRegistered;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Laracasts\Commander\Events\EventGenerator;

/**
 * Class User
 */
class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Fillable attributes
	 *
	 * @var array
	 */
	protected $fillable = array('username', 'email', 'password');

	/**
	 * Always hash yo shit sucka
	 *
	 * @param $password
	 */
	public function setPasswordAttribute($password){
		$this->attributes['password'] = Hash::make($password);
	}


	/**
	 * Register a user
	 *
	 * @param $username
	 * @param $email
	 * @param $password
	 * @return static
	 */
	public static function register($username, $email, $password = false){
		if (!$password){
			$password = 'ch@ng3m3';
		}
		$user = new static(compact('username', 'email', 'password'));

		$user->raise(new UserRegistered($user));

		return $user;
	}

	public function gravatar($size = false, $attr = [], $link = false){
		$url = "http://gravatar.com/avatar/";
		$hash = md5($this->email);
		$extra = '';
		if ($size){
			$extra = "?s=".$size;
		}
		$gravatarLink = $url.$hash.$extra;

		$attrString = '';
		foreach ($attr as $key => $val){
			$attrString .= " $key='$val'";
		}

		$imgStr = "<img src='$gravatarLink' alt='$this->username' $attrString/>";

		if ($link){
			$dest = $link[0];
			$options = $link[1];
			$optionString = '';
			foreach ($options as $key => $val){
				$optionString .= " $key='$val'";
			}
			$wrapper = "<a href='$dest' $optionString>$imgStr</a>";
			return $wrapper;
		}
		return $imgStr;
	}
}
