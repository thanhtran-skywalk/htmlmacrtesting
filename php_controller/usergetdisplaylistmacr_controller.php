<?php
	include 'service/UserService.php';
	$userService = new UserService();
	$rs = $userService->getDisplayUsersMacr();
	echo json_encode($rs);
?>