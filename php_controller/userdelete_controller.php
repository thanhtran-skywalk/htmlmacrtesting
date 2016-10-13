<?php
	include 'service/UserService.php';

	if (!empty($_GET['userid'])) {
	 	$userService = new UserService();
	 	$user = $userService->findByUserId($_GET['userid']);
	 	if(!empty($user['macr_img_path'])){
	 		unlink('..'. $user['macr_img_path']);
	 	}
		$rs = $userService->deleteUser($_GET['userid']);
		header('Location: /admin/main.php');
	}
?>