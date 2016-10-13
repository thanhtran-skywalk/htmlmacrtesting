<?php
	include 'service/NewsService.php';

	if (!empty($_GET['newsid'])) {
	 	$newsService = new NewsService();
	 	$news = $newsService->findNewsById($_GET['newsid']);
	 	if(!empty($news['macr_img_path'])){
	 		unlink('..'. $news['macr_img_path']);
	 	}
		$rs = $newsService->deleteNews($_GET['newsid']);
		header('Location: /admin/news.php');
	}
?>