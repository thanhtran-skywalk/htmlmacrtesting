<?php
include 'service/UserService.php';

$userService = new NewsService();

// $rs = $userService->findByUserNameAndPassword('thanhtran','thanhtran');
// if (empty($rs)) {
//      print_r("empty");
// }else{
// 	print_r($rs);
// }

// $rs = $userService->updateUser(3, 'theskywalker', 'The Skywalker - updated', 'theskywalker@gmail.com', 'thanhtran', '', 'Software development - Sai Gon University ', 'Software Engineer.');
// print_r($rs);
$rs = $userService->deleteUser(3);
print_r($rs);


?>