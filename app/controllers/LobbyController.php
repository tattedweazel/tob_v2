<?php

class LobbyController extends \BaseController {

	public function index()
	{
		return View::make('pages.lobby.index')
			->withSectionTitle('Lobby');
	}
}