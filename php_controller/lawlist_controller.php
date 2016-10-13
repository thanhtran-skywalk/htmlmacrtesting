<?php
include 'service/LibService.php';

	$page = 0;
	if (!empty($_GET['page'])) {
	 	$page = $_GET['page'];	
	}

 	$libService = new LibService();
	$rs = $libService->getLawDocsList($page);
	
	echo json_encode($rs);
?>