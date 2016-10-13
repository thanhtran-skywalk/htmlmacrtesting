<?php
	include 'service/BookService.php';

	if (!empty($_GET['itemid'])) {
	 	$bookService = new BookService();
		$rs = $bookService->findBookById($_GET['itemid']);
		echo json_encode($rs);
	}
?>