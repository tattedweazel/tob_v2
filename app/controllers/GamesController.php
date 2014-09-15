<?php

use Tob\Games\Forms\CreatePrivateGameForm;
use Tob\Games\Forms\CreatePublicGameForm;
use Tob\Games\Forms\GamePasswordForm;
use Tob\Games\Game;
use Tob\Players\Player;

class GamesController extends \BaseController {

	/**
	 * @var CreatePrivateGameForm
	 */
	private $createPrivateGameForm;
	/**
	 * @var CreatePublicGameForm
	 */
	private $createPublicGameForm;
	/**
	 * @var GamePasswordForm
	 */
	private $gamePasswordForm;

	public function __construct(CreatePrivateGameForm $createPrivateGameForm, CreatePublicGameForm $createPublicGameForm, GamePasswordForm $gamePasswordForm)
	{
		$this->createPrivateGameForm = $createPrivateGameForm;
		$this->createPublicGameForm = $createPublicGameForm;
		$this->gamePasswordForm = $gamePasswordForm;
	}


	/**
	 * Display a listing of the resource.
	 * GET /games
	 *
	 * @return Response
	 */
	public function index()
	{
		$games = Game::where('open', '=', 1)->get();

		return $games;
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /games
	 *
	 * @return Response
	 */
	public function store()
	{
		$formData = Input::only('name','max_players', 'private', 'password');
		if ($formData['private']){
			$this->createPrivateGameForm->validate($formData);
			$password = $formData['password'];
		}
		else {
			$this->createPublicGameForm->validate($formData);
			$password = false;
		}

		$current_user = Auth::user();
		$game = Game::createNew($formData['name'], $formData['max_players'], $formData['private'], $password, $current_user->id);
		$game->save();

		$player = new Player(['game_id' => $game->id, 'user_id' => $current_user->id, 'slot' => 1]);
		$player->save();

		return Redirect::route('match_path', [$game->id]);

	}

	/**
	 * Display the specified resource.
	 * GET /games/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (! $game = Game::find($id)){
			return Redirect::route('lobby_path')->withErrors('Cannot find game.');
		}

		if ( ! $this->isInGame($game)){
			return Redirect::back()->withErrors('You are not authorized to enter this game');
		}

		return View::make('pages.games.index')
			->withGame($game)
			->withSectionTitle($game->name);
	}

	public function join($id){
		$game = Game::find($id);

		if (! $error = $this->ensureJoinable($game)){
			return Redirect::route('lobby_path')->withErrors($error);
		}

		// If they're already on the roster, just send'em through
		if ($this->isInGame($game)){
			return Redirect::route('match_path', [$game->id]);
		}


		// if the game is private, make them put in the password
		if ( $game->private){
			return Redirect::route('match_authorize_path', [$game->id]);
		}

	}

	public function authCheck($id){
		$game = Game::find($id);

		if (! $error = $this->ensureJoinable($game)){
			return Redirect::route('lobby_path')->withErrors($error);
		}

		return View::make('pages.games.authorize')
			->withGame($game)
			->withSectionTitle('Private Game');
	}

	public function authorize($id){
		$formData = Input::only('password');

		$this->gamePasswordForm->validate($formData);

		$game = Game::find($id);

		if (! $error = $this->ensureJoinable($game)){
			return Redirect::route('lobby_path')->withErrors($error);
		}

		if ($game->password != $formData['password']){
			return Redirect::back()->withErrors('Incorrect Password');
		}

		$current_user = Auth::user();
		$playerCount = count($game->player);
		$player = new Player(['game_id' => $game->id, 'user_id' => $current_user->id, 'slot' => $playerCount + 1]);
		$player->save();
		return Redirect::route('match_path', $game->id);
	}

	private function isInGame($game){
		$players = $game->player;
		$current_user = Auth::user();
		foreach ($players as $player){
			if ($player->user['id'] == $current_user->id){
				return true;
			}
		}
		return false;
	}

	private function gameIsFull($game){
		$playerCount = count($game->player);
		$maxPlayers = $game->max_players;
		if ($playerCount >= $maxPlayers){
			return true;
		}
		return false;
	}

	private function ensureJoinable($game){
		if (! isset($game->id)){
			return 'Cannot find game';
		}
		if ($this->gameIsFull($game)){
			return 'This game is full';
		}
		if ( ! $game->open){
			return 'This game is closed';
		}
		return true;
	}

}