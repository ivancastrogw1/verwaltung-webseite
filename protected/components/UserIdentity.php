<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$username = $this->username;
		$user = User::model()->find('username=?',array($username));
		if(isset($this->password) && isset($username) && isset($user))
		{
			$validation = $user->validatePassword($this->password,$username,$user);		
		}

		if($user === NULL)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}elseif ($validation == false) {			
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else
		{
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
			
		}
		return $this->errorCode;
	}
}