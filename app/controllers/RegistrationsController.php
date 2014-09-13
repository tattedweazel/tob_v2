<?php

use Tob\Users\Forms\RegistrationForm;
use Tob\Users\User;

class RegistrationsController extends \BaseController {

	/**
	 * @var RegistrationForm
	 */
	private $registrationForm;

	public function __construct(RegistrationForm $registrationForm){
		$this->registrationForm = $registrationForm;
	}

	public function create(){
		return View::make('pages.registration.index')
			->withSectionTitle('Register');
	}

	public function store(){

		$formData = Input::all();
		$this->registrationForm->validate($formData);

		$user = User::register($formData['username'], $formData['email'], $formData['password']);
		$user->save();

		Auth::login($user);

		return Redirect::home();
	}

}