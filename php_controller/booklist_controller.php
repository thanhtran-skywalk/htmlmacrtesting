<?php
include 'service/BookService.php';

	$page = 0;
	if (!empty($_GET['page'])) {
	 	$page = $_GET['page'];	
	}

 	$bookService = new BookService();
	$rs = $bookService->getBookList($page);
	
	echo json_encode($rs);
?>