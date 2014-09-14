<?php namespace Tob\Games\Events;


use Tob\Games\Game;

class GameCreated {

	/**
	 * @var
	 */
	public $game;

	/**
	 * @param Game $game
	 * @internal param $user
	 */
	function __construct(Game $game)
	{
		$this->game = $game;
	}
}