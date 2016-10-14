<?php
include 'service/UserService.php';

ob_start();
session_start();

 if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$userService = new UserService();
	$rs = $userService->findByEmailAndPassword($_POST['email'],$_POST['password']);
	if (empty($rs)) {
	     $_SESSION['loggedIn'] = false;
	     header('Location: /admin/index.php?error=true');
	}else{
		$_SESSION['loggedIn'] = true;
		$_SESSION['currentuserid'] = $rs['macr_user_id'];
		$_SESSION['currentp'] = $rs['macr_password'];
		header('Location: /admin/main.php');
	}
 }else{
 	header('Location: /admin/index.php?error=true');
 }

?>