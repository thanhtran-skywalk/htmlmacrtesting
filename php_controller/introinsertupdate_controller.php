<?php
include 'service/IntroService.php';

if(isset($_POST["submit"])) {

   $macr_intro_content = $_POST["macr_intro_content"];
   $sub_description = $_POST["sub_description"];
   $macr_story = $_POST["macr_story"];
   $adviser = $_POST["adviser"];
   $core_value = $_POST["core_value"];
   $destiny = $_POST["destiny"];
   $is_macrgroup = $_POST["is_macrgroup"];

   $introService = new IntroService();

   if(!empty($_POST['intro_itemid'])){
      $id = $_POST['intro_itemid'];
      $rs = $introService->updateItem($id, $macr_intro_content, $sub_description, $macr_story, $adviser, $core_value, $destiny, $is_macrgroup);
   }else{
      $rs = $introService->insertItem($macr_intro_content, $sub_description, $macr_story, $adviser, $core_value, $destiny, $is_macrgroup);
   }
   
   header('Location: /admin/macrgroup.php');
   
}

?>