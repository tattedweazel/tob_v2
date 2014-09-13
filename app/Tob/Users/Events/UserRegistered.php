<?php namespace Tob\Users\Events;


use Tob\Users\User;

class UserRegistered {

	/**
	 * @var
	 */
	public $user;

	/**
	 * @param $user
	 */
	function __construct(User $user)
	{
		$this->user = $user;
	}
} 