<?php
	include 'service/UserService.php';

	if (!empty($_GET['userid'])) {
	 	$userService = new UserService();
		$rs = $userService->findByUserId($_GET['userid']);
		echo json_encode($rs);	
	}
?>