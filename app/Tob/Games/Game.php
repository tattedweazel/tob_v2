<?php namespace Tob\Games;

use Illuminate\Support\Facades\Hash;
use Tob\Games\Events\GameCreated;
use Laracasts\Commander\Events\EventGenerator;

class Game extends \Eloquent {

	use EventGenerator;

	protected $table = 'games';

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
	protected $fillable = array('name', 'max_players', 'private', 'password', 'user_id');

	/**
	 * Always hash yo shit sucka
	 *
	 * @param $password
	 */
//	public function setPasswordAttribute($password){
//		$this->attributes['password'] = Hash::make($password);
//	}

	/**
	 * Create a game
	 *
	 * @param $name
	 * @param $players
	 * @param $private
	 * @param $password
	 * @internal param $gamename
	 * @internal param $email
	 * @return static
	 */
	public static function createNew($name, $max_players, $private, $password, $user_id){

		if ($private){
			$game = new static(compact('name', 'max_players', 'private', 'password', 'user_id'));
		}
		else {
			$game = new static(compact('name', 'max_players', 'user_id'));
		}

		$game->raise(new GameCreated($game));

		return $game;
	}

	public function user(){
		return $this->belongsTo('Tob\Users\User');
	}

	public function player(){
		return $this->hasMany('Tob\Players\Player');
	}
}