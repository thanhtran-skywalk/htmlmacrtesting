<?php
include 'service/LibService.php';

if(isset($_POST["submit"])) {

	$file_name = "";

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
         move_uploaded_file($file_tmp,"../img/laws/".$file_name);
      }else{
         print_r($errors);
      }
   }

   $macr_law_titile = $_POST["macr_law_titile"];
   $macr_law_id = $_POST["macr_law_id"];
   $macr_law_content = $_POST["macr_law_content"];
   $macr_img_path = $_POST['oldimage'];

   if(!empty($file_name)){
   		$macr_img_path = "/img/laws/".$file_name;
   }


   $libService = new LibService();

   if(!empty($_POST['itemid'])){
      $compareStr = strcmp($_POST['oldimage'], $macr_img_path);
     
      if($compareStr !== 0 && !empty($_POST['oldimage'])){
         unlink('..'. $_POST['oldimage']);
      }
      
      $macr_law_id = $_POST['itemid'];
      $rs = $libService->updateLawDoc($macr_law_id, $macr_law_titile, $macr_law_content, $macr_img_path);
   }else{
      $rs = $libService->insertLawDoc($macr_law_id, $macr_law_titile, $macr_law_content, $macr_img_path);
   }
   
   header('Location: /admin/law.php');
   
}

?>