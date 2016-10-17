<?php
	include 'service/IntroService.php';

	if (!empty($_GET['itemid'])) {
	 	$introService = new IntroService();
		$rs = $introService->deleteItem($_GET['itemid']);
		header('Location: /admin/macrgroup.php');
	}
?>