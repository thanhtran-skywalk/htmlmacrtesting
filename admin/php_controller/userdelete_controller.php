<?php
	include 'service/UserService.php';

	if (!empty($_GET['userid'])) {
	 	$userService = new UserService();
		$rs = $userService->deleteUser($_GET['userid']);
		header('Location: /admin/main.php');
	}
?>