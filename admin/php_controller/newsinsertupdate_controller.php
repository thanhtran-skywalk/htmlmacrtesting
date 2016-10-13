<?php
include 'service/NewsService.php';

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
         move_uploaded_file($file_tmp,"../img/news/".$file_name);
      }else{
         print_r($errors);
      }
   }

   $macr_news_title = $_POST["title"];
   $macr_news_contents = $_POST["content"];
   

   $macr_img_path = $_POST['oldimage'];
   if(!empty($file_name)){
   		$macr_img_path = "/admin/img/news/".$file_name;
   }


   $newsService = new NewsService();

   if(!empty($_POST['newsid'])){
      $macr_news_id = $_POST['newsid'];
      $rs = $newsService->updateNews($macr_news_id, $macr_news_title, $macr_news_contents, $macr_img_path);
   }else{
      $rs = $newsService->insertNews($macr_news_title, $macr_news_contents, $macr_img_path);
   }
   
   header('Location: /admin/news.php');
   
}

?>