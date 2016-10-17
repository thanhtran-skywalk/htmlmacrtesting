<?php
	include 'service/BannerService.php';

	if (!empty($_GET['itemid'])) {
	 	$bannerService = new BannerService();
	 	$item = $bannerService->findById($_GET['itemid']);
	 	if(!empty($item['macr_image'])){
	 		unlink('..'. $item['macr_image']);
	 	}
		$rs = $bannerService->deleteItem($_GET['itemid']);
		header('Location: /admin/macrgroup.php');
	}
?>