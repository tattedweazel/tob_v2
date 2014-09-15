<?php namespace Tob\Players;


class PlayerRepository {

	/**
	 * Persist
	 *
	 * @param Player $player
	 * @return mixed
	 */
	public function save(Player $player){

		return $player->save();

	}
}