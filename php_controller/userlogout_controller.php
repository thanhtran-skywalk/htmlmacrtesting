<?php
	ob_start();
	session_start();
	unset($_SESSION["loggedIn"]);
	unset($_SESSION["currentuserid"]);
	unset($_SESSION["currentp"]);
	header('Location: /admin/index.php');
?>