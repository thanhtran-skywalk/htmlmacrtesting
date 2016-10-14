<?php
	include 'service/UserService.php';
	session_start();
	if (!empty($_SESSION['currentuserid'])) {
	 	$comparePass = strcmp($_SESSION['currentp'], md5($_POST["oldpass"]));

	 	if($comparePass === 0){
	 		$userService = new UserService();
			$rs = $userService->updatePassword($_SESSION['currentuserid'], $_POST["newpass"]);
			echo "success_change";	
	 	}else{
	 		echo "wrong_old_pass";
	 	}

	}
?>