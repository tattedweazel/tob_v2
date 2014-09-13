<?php namespace Tob\Users\Forms;

use Laracasts\Validation\FormValidator;

class PasswordResetRequestForm extends FormValidator{
	protected $rules = [
		"email" => "required",
	];
}