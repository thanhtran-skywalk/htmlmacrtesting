<?php
include 'service/BookService.php';

	$page = 0;
	if (!empty($_GET['page'])) {
	 	$page = $_GET['page'];	
	}
	$limit = 10;
	if(!empty($_GET['limit'])){
		$limit = $_GET['limit'];
	}

 	$bookService = new BookService();
	$rs = $bookService->getBookList($page, $limit);
	
	echo json_encode($rs);
?>