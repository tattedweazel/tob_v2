<?php namespace Tob\Players;


class Player extends \Eloquent {

	protected $table = 'players';

	protected $fillable = array('game_id', 'user_id', 'slot');

	public function game(){
		return $this->belongsTo('Tob\Games\Game');
	}

	public function user(){
		return $this->belongsTo('Tob\Users\User');
	}
}