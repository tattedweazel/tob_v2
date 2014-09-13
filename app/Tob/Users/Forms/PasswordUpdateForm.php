<?php namespace Tob\Users\Forms;

use Laracasts\Validation\FormValidator;

class PasswordUpdateForm extends FormValidator{
	protected $rules = [
		"old_password" => "required",
		"new_password" => "required|min:6|confirmed"
	];
}