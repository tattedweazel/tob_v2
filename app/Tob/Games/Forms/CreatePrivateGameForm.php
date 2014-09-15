<?php namespace Tob\Games\Forms;


use Laracasts\Validation\FormValidator;

class CreatePrivateGameForm extends FormValidator {

	protected $rules = [
		"name" => 'required',
		"players" => "required|numeric|min:1",
		"password" => "required"
	];

}