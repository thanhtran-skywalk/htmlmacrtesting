<?php
include 'service/LibService.php';

	$page = 0;
	if (!empty($_GET['page'])) {
	 	$page = $_GET['page'];	
	}

	$limit = 10;
	if(!empty($_GET['limit'])){
		$limit = $_GET['limit'];
	}

 	$libService = new LibService();
	$rs = $libService->getLawDocsList($page, $limit);
	
	echo json_encode($rs);
?>