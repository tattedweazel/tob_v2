<?php

use Tob\Games\Game;

class LobbyController extends \BaseController {

	public function index()
	{
		$availableGames = Game::where('open', '=', 1)->get();
		return View::make('pages.lobby.index')
			->withSectionTitle('Lobby')
			->withAvailableGames($availableGames);
	}
}