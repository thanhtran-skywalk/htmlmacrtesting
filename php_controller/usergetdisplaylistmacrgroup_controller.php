<?php
	include 'service/UserService.php';
	$userService = new UserService();
	$rs = $userService->getDisplayUsersMacrgroup();
	echo json_encode($rs);
?>