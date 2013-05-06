<?php

namespace App\Controller;

class Auth extends \App\Vendor\Auth\Controller\Auth {

	/**
	 * Log In
	 * @param string Relative redirect URL (base64 encoded)
	 */
	public function login($redirect = false) {

		parent::login($redirect);
		$this->data('redirect', $redirect);

	}

	/**
	 * Register
	 * @param string Relative redirect URL (base64 encoded)
	 */
	public function register($redirect = false) {

		if(is_post()) {

			$clear_pass = $this->random_password();
			$user = \App\Model\User::from_post(array('email', 'display_name'));
			$user->password = \Library\Auth::hash($clear_pass);
			$errors = $user->valid();
			
			if(!is_array($errors)) {

				$id = $user->save();
				mail($user->email, 'Burner CMS Registration', "Thank you for registering!\n\n" .
					"Your temporary password is: $clear_pass\n\n" .
					"Make sure that you log into your new account and change the password as soon as possible.");

				$this->template('auth/register_success');
				$this->data('redirect', $redirect);

			} else {

				$this->data('errors', $errors);

			}

			$this->data('email', $user->email);
			$this->data('display_name', $user->display_name);

		} else {

			$this->data('email', null);
			$this->data('display_name', null);

		}

	}

	/**
	 * Random Password
	 * @return string Plain text password
	 */
	private function random_password() {

		$len = mt_rand(20, 30);
		$chars = 'ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz123456789_$#%@';
		$chars_len = strlen($chars) - 1;
		$password = '';

		for($i = 0; $i < $len; $i++) {

			$password .= substr($chars, mt_rand(0, $chars_len), 1);

		}

		return $password;

	}
	
}