<?php namespace Tob\Users\Forms;

use Laracasts\Validation\FormValidator;

class NewPasswordForm extends FormValidator{
	protected $rules = [
		"email" => "required",
		"password" => "required|min:6|confirmed"
	];
}