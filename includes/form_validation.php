<?php


	/**
	 * Validator
	 */
	class Validator {
		private $login;
		private $email;
		private $password;
		private $errors = array();

		function setErrors($errors) {
			$this->errors = $errors;
		}

		function getErrors() {
			return $this->errors;
		}

		/*function __construct($login, $email, $password, $re_password) {
			echo $login;
			$this->login = $this->clean($login);
			$this->email = $this->clean($email);
			$this->password = $password;
		}



		function checkEmpty() {
			$errors = array();
			if (empty($this->login)) {
				$errors[] = "Login не введен";
        	}
        	if (empty($this->email)) {
            	$errors[] = "Email не введен";
        	}
        	if (empty($this->password)) {
            	$errors[] = "Пароль не введен";
        	}
        	if (empty($this->re_password)) {
            	$errors[] = "Повторный пароль не введен";
        	}
        	return $errors;
		}

		function validateEmail() {
			return filter_var($this->email, FILTER_VALIDATE_EMAIL);
		}

		function checkLen($str, $min, $max) {
			$strLength = mb_strlen($str);
			return !($strLength < $min || $strLength > $max);
		}

		private function clean() {
			$value = trim($value);
			$value = stripslashes($value);
			$value = strip_tags($value);
			return $value;
		}

		function getLogin() {
			return $this->login;
		}

		function getEmail() {
			return $this->email;
		}*/

	}

?>