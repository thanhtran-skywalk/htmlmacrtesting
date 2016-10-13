<?php
	include 'service/BookService.php';

	if (!empty($_GET['itemid'])) {
	 	$bookService = new BookService();
	 	$book = $bookService->findBookById($_GET['itemid']);
	 	if(!empty($book['macr_book_img_path'])){
	 		unlink('..'. $book['macr_book_img_path']);
	 	}
		$rs = $bookService->deleteBook($_GET['itemid']);
		header('Location: /admin/book.php');
	}
?>