<?php

use Tob\Users\Exceptions\DuplicateEntryException;
use Tob\Users\Forms\AccountSettingsForm;
use Tob\Users\Forms\PasswordUpdateForm;

class AccountsController extends \BaseController {

	/**
	 * @var AccountSettingsForm
	 */
	private $accountSettingsForm;
	/**
	 * @var PasswordUpdateForm
	 */
	private $passwordUpdateForm;

	public function __construct(AccountSettingsForm $accountSettingsForm, PasswordUpdateForm $passwordUpdateForm)
	{
		$this->accountSettingsForm = $accountSettingsForm;
		$this->passwordUpdateForm = $passwordUpdateForm;
	}

	public function index()
	{
		return View::make('pages.account.index')
			->withSectionTitle('Account');
	}

	public function update()
	{
		$formData = Input::only('username', 'email');
		$this->accountSettingsForm->validate($formData);

		$user = Auth::user();

		$this->checkForDuplicate('username', $formData, $user);
		$this->checkForDuplicate('email', $formData, $user);

		$user->username = $formData['username'];
		$user->email = $formData['email'];
		$user->save();

		Flash::success('Your information has been updated');
		return Redirect::back();
	}

	public function updatePassword()
	{
		$formData = Input::only('old_password', 'new_password', 'new_password_confirmation');
		$this->passwordUpdateForm->validate($formData);

		$user = Auth::user();
		$hashedPassword = Hash::make($formData['old_password']);
		if (!Auth::attempt(['email' => $user->email, 'password' => $formData['old_password']])){
			return Redirect::back()->withErrors('Whatever you put in "Old Password" was wrong. Please try that again.'.$user->password.' - '.$hashedPassword);
		}

		$user->password = $formData['new_password'];
		$user->save();

		Flash::success('Your password has been updated');
		return Redirect::back();
	}

	private function checkForDuplicate($type, $formData, $user){
		if ($formData[$type] != $user->{$type}){
			$dupeCheck = User::where($type, '=', $formData[$type])->first();
			if (isset($dupeCheck->id) && $dupeCheck->id != $user->id){
				throw new DuplicateEntryException("That $type is already in use.", null);
			}
		}
	}

}