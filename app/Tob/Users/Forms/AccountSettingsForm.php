<?php namespace Tob\Users\Forms;

use Laracasts\Validation\FormValidator;

class AccountSettingsForm extends FormValidator{
	protected $rules = [
		"username" => "required",
		"email" => "email|required"
	];
}