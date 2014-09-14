<?php

use Tob\Users\Forms\SignInForm;

class SessionsController extends \BaseController {

	/**
	 * @var SignInForm
	 */
	private $signInForm;

	function __construct(SignInForm $signInForm)
	{
		$this->signInForm = $signInForm;
	}

	public function create(){

		return View::make('pages.login.index')
			->withSectionTitle('Login');
	}

	public function store(){

		$formData = Input::only('email', 'password');
		$this->signInForm->validate($formData);
		if (Auth::attempt($formData)){
			return Redirect::intended('/lobby');
		}
		else {
			return Redirect::back()->withErrors("The information you've entered is incorrect. Please try harder.");
		}


	}

	public function destroy(){
		Auth::logout();
		return Redirect::home();
	}

}