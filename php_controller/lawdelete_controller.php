<?php
	include 'service/LibService.php';

	if (!empty($_GET['itemid'])) {
	 	$libService = new LibService();
	 	$law = $libService->findLawDocById($_GET['itemid']);
	 	if(!empty($law['macr_img_path'])){
	 		unlink('..'. $law['macr_img_path']);
	 	}

		$rs = $libService->deleteLawDoc($_GET['itemid']);
		header('Location: /admin/law.php');
	}
?>