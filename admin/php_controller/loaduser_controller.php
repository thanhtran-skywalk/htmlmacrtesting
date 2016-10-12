<?php
include 'service/UserService.php';

	$page = 0;
	if (!empty($_GET['page'])) {
	 	$page = $_GET['page'];	
	}

 	$userService = new UserService();
	$rs = $userService->getListUser($page);
	
	echo json_encode($rs);
?>