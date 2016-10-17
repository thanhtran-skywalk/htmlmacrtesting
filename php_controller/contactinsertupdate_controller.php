<?php
include 'service/ContactService.php';

if(isset($_POST["submit"])) {

   $adress = $_POST["adress"];
   $phone = $_POST["phone"];
   $email = $_POST["email"];
   $workingtimenormal = $_POST["workingtimenormal"];
   $workingtimeweeken = $_POST["workingtimeweeken"];
   $map = $_POST["map"];

   $contactService = new ContactService();

   if(!empty($_POST['itemid'])){
      $rs = $contactService->updateItem($adress, $phone, $email, $workingtimenormal, $workingtimeweeken, $map);
   }else{
      $rs = $contactService->insertItem($adress, $phone, $email, $workingtimenormal, $workingtimeweeken, $map);
   }
   
   header('Location: /admin/macrgroup.php');
   
}

?>