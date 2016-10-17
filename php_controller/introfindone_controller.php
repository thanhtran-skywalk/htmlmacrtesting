<?php
	include 'service/IntroService.php';

	if (!empty($_GET['itemid'])) {
	 	$introService = new IntroService();
		$rs = $introService->findById($_GET['itemid']);
		echo json_encode($rs);
	}
?>