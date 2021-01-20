<?php
	include "db.php";

	if (isset($_SESSION['logged_user'])) {
		unset($_SESSION['logged_user']);
		session_destroy();
		header("Location:/");
	}

?>