<?php
	include 'service/ContactService.php';

	if (!empty($_GET['itemid'])) {
	 	$contactService = new ContactService();
		$rs = $contactService->findById($_GET['itemid']);
		echo json_encode($rs);
	}
?>