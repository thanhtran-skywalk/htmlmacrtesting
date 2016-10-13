<?php
include 'service/UserService.php';

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
         move_uploaded_file($file_tmp,"../img/".$file_name);
      }else{
         print_r($errors);
      }
   }
   $macr_user_display_name = $_POST["displayName"];
   $macr_full_name = $_POST["fullName"];
   $macr_email = $_POST["email"];
   $macr_password = $_POST["password"];
   $macr_user_role = 0;
   if(isset($_POST['role']) && $_POST['role'] == 'yes'){
	    $macr_user_role = 1;
	}
   $macr_position = $_POST["position"];
   $macr_education = $_POST["education"];
   $macr_major = $_POST["major"];
   $macr_img_path = $_POST['oldimage'];
   if(!empty($file_name)){
   		$macr_img_path = "/admin/img/".$file_name;
   }

   $macrgroup = 0;
   $macr = 0;
   $macrgroup_order = 0;
   $macr_order = 0;

   if(isset($_POST['macrgroup']) && $_POST['macrgroup'] == 'yes'){
       $macrgroup = 1;
   }
   if(isset($_POST['macr']) && $_POST['macr'] == 'yes'){
       $macr = 1;
   }

   if(isset($_POST['macrgroup_order'])){
       $macrgroup_order = $_POST['macrgroup_order'];
   }
   if(isset($_POST['macr_order'])){
       $macr_order = $_POST['macr_order'];
   }

   $userService = new UserService();
   if(!empty($_POST['userid'])){
      $macr_user_id = $_POST['userid'];
      $rs = $userService->updateUser($macr_user_id, $macr_full_name, $macr_email, $macr_position, $macr_education, $macr_major, $macr_img_path, $macr_user_role, $macr_user_display_name, $macrgroup, $macr, $macrgroup_order, $macr_order);
   }else{
      $rs = $userService->insertUser($macr_full_name, $macr_email, $macr_password, $macr_position, $macr_education, $macr_major, $macr_img_path, $macr_user_role, $macr_user_display_name, $macrgroup, $macr, $macrgroup_order, $macr_order);
   }
   
   header('Location: /admin/main.php');
   
}

?>