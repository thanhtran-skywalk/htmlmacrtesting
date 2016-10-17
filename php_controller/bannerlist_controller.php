<?php
include 'service/BannerService.php';

 	$bannerService = new BannerService();
	$rs = $bannerService->getList();
	
	echo json_encode($rs);
?>