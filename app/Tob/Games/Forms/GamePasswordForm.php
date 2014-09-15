<?php namespace Tob\Games\Forms;


use Laracasts\Validation\FormValidator;

class GamePasswordForm extends FormValidator {

	protected $rules = [
		"password" => "required"
	];

}