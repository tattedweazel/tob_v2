<?php

use Tob\Games\Forms\CreatePrivateGameForm;
use Tob\Games\Forms\CreatePublicGameForm;
use Tob\Games\Game;

class GamesController extends \BaseController {

	/**
	 * @var CreatePrivateGameForm
	 */
	private $createPrivateGameForm;
	/**
	 * @var CreatePublicGameForm
	 */
	private $createPublicGameForm;

	public function __construct(CreatePrivateGameForm $createPrivateGameForm, CreatePublicGameForm $createPublicGameForm)
	{
		$this->createPrivateGameForm = $createPrivateGameForm;
		$this->createPublicGameForm = $createPublicGameForm;
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
		$formData = Input::only('name','players', 'private', 'password');
		if ($formData['private']){
			$this->createPrivateGameForm->validate($formData);
			$password = $formData['password'];
		}
		else {
			$this->createPublicGameForm->validate($formData);
			$password = false;
		}

		$current_user = Auth::user();

		$game = Game::createNew($formData['name'], $formData['players'], $formData['private'], $password, $current_user->id);
		$game->save();

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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /games/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /games/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /games/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}