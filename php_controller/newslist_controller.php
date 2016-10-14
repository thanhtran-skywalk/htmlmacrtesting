<?php
include 'service/NewsService.php';

	$page = 0;
	if (!empty($_GET['page'])) {
	 	$page = $_GET['page'];	
	}
	$limit = 10;
	if(!empty($_GET['limit'])){
		$limit = $_GET['limit'];
	}

 	$newsService = new NewsService();
	$rs = $newsService->getNewsList($page, $limit);
	
	echo json_encode($rs);
?>