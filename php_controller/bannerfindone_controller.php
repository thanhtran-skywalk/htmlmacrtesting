<?php
	include 'service/BannerService.php';

	if (!empty($_GET['itemid'])) {
	 	$bannerService = new BannerService();
		$rs = $bannerService->findById($_GET['itemid']);
		echo json_encode($rs);
	}
?>