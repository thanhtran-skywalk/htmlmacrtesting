<?php
	include 'service/NewsService.php';

	if (!empty($_GET['newsid'])) {
	 	$newsService = new NewsService();
		$rs = $newsService->findNewsById($_GET['newsid']);
		echo json_encode($rs);
	}
?>