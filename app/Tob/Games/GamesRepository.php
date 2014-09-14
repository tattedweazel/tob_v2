<?php namespace Tob\Games;


class GameRepository {

	/**
	 * Persist
	 *
	 * @param Game $game
	 * @internal param User $user
	 * @return mixed
	 */
	public function save(Game $game){

		return $game->save();

	}
}