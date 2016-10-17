<?php
include 'service/BannerService.php';

if(isset($_POST["submit"])) {

	$file_name = "";
   $file_nameLogo = "";

   if(isset($_FILES['imagefile']) && !empty($_FILES['imagefile']['name'])){
      $errors= array();
      $file_name = $_FILES['imagefile']['name'];
      $file_size = $_FILES['imagefile']['size'];
      $file_tmp = $_FILES['imagefile']['tmp_name'];
      $file_type = $_FILES['imagefile']['type'];

      $temp = explode(".", $file_name);
      $file_name = round(microtime(true)) . '.' . end($temp);
      
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../img/banners/".$file_name);
      }else{
         print_r($errors);
      }
   }

   if(isset($_FILES['imagefilelogo']) && !empty($_FILES['imagefilelogo']['name'])){
      $errorsLogo= array();
      $file_nameLogo = $_FILES['imagefilelogo']['name'];
      $file_sizeLogo = $_FILES['imagefilelogo']['size'];
      $file_tmpLogo = $_FILES['imagefilelogo']['tmp_name'];

      $tempLogo = explode(".", $file_nameLogo);
      $file_nameLogo = round(microtime(true)) . '.' . end($tempLogo);
      
      
      if($file_sizeLogo > 2097152) {
         $errorsLogo[]='File size must be excately 2 MB';
      }
      
      if(empty($errorsLogo)==true) {
         move_uploaded_file($file_tmpLogo,"../img/logo/".$file_nameLogo);
      }else{
         print_r($errorsLogo);
      }
   }

   $macr_title = $_POST["macr_title"];
   $macr_short_slogan = $_POST["macr_short_slogan"];
   $macr_url = $_POST["macr_url"];
   $macr_order = $_POST["macr_order"];

   $macr_image = $_POST['oldimage'];
   if(!empty($file_name)){
   		$macr_image = "/img/banners/".$file_name;
   }

   $macr_logo = $_POST['oldimageLogo'];
   if(!empty($file_nameLogo)){
         $macr_logo = "/img/logo/".$file_nameLogo;
   }
   if(empty($macr_logo)){
      $macr_logo = "/img/logo/logo_150_dark_solid.png";
   }

   $bannerService = new BannerService();

   if(!empty($_POST['itemid'])){
      $compareStr = strcmp($_POST['oldimage'], $macr_image);
     
      if($compareStr !== 0 && !empty($_POST['oldimage'])){
         unlink('..'. $_POST['oldimage']);
      }
      $id = $_POST['itemid'];
      $rs = $bannerService->updateItem($id, $macr_image, $macr_logo, $macr_title, $macr_short_slogan, $macr_url, $macr_order);
   }else{
      $rs = $bannerService->insertItem($macr_image, $macr_logo, $macr_title, $macr_short_slogan, $macr_url, $macr_order);
   }
   
   header('Location: /admin/macrgroup.php');
   
}

?>