<?php
	include 'service/NewsService.php';

	if (!empty($_GET['newsid'])) {
	 	$newsService = new NewsService();
		$rs = $newsService->deleteNews($_GET['newsid']);
		header('Location: /admin/news.php');
	}
?>