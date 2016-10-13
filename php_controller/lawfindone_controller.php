<?php
	include 'service/LibService.php';

	if (!empty($_GET['itemid'])) {
	 	$libService = new LibService();
		$rs = $libService->findLawDocById($_GET['itemid']);
		echo json_encode($rs);
	}
?>