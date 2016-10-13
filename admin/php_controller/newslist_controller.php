<?php
include 'service/NewsService.php';

	$page = 0;
	if (!empty($_GET['page'])) {
	 	$page = $_GET['page'];	
	}

 	$newsService = new NewsService();
	$rs = $newsService->getNewsList($page);
	
	echo json_encode($rs);
?>