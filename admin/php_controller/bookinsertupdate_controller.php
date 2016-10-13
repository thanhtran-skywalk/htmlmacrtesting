<?php
include 'service/BookService.php';

if(isset($_POST["submit"])) {

	$file_name = "";

   if(isset($_FILES['imagefile']) && !empty($_FILES['imagefile']['name'])){
      $errors= array();
      $file_name = $_FILES['imagefile']['name'];
      $file_size = $_FILES['imagefile']['size'];
      $file_tmp = $_FILES['imagefile']['tmp_name'];
      $file_type = $_FILES['imagefile']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['imagefile']['name'])));

      $temp = explode(".", $file_name);
      $file_name = round(microtime(true)) . '.' . end($temp);
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../img/books/".$file_name);
      }else{
         print_r($errors);
      }
   }

   $macr_book_name = $_POST["macr_book_name"];
   $macr_book_author = $_POST["macr_book_author"];
   $macr_book_description = $_POST["macr_book_description"];
   $publisher = $_POST["publisher"];
   $macr_book_img_path = $_POST['oldimage'];

   if(!empty($file_name)){
   		$macr_book_img_path = "/admin/img/books/".$file_name;
   }


   $bookService = new BookService();

   if(!empty($_POST['itemid'])){
      $macr_book_id = $_POST['itemid'];
      $rs = $bookService->updateBook($macr_book_id, $macr_book_name, $macr_book_author, $macr_book_description, $macr_book_img_path, $publisher);
   }else{
      $rs = $bookService->insertBook($macr_book_name, $macr_book_author, $macr_book_description, $macr_book_img_path, $publisher);
   }
   
   header('Location: /admin/book.php');
   
}

?>