<?php namespace Tob\Games\Forms;


use Laracasts\Validation\FormValidator;

class CreatePublicGameForm extends FormValidator {

	protected $rules = [
		"name" => 'required',
		"max_players" => "required|numeric|min:1",
	];

}