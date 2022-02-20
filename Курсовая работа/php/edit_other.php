<?php
require_once 'connect.php';
$id = $_POST['id'];
$login = $_POST['login'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$country = $_POST['country'];
$city = $_POST['city'];
if(mb_strlen($login) < 5 || mb_strlen($login) > 15){
  echo "Размер логина должен быть от 5 до 15 символов ";
  exit();
} elseif (mb_strlen($last_name) > 20) {
  echo "Размер данного поля не должен превышать 20 символов";
  exit();
} elseif (mb_strlen($first_name) > 20) {
  echo "Размер данного поля не должен превышать 20 символов";
  exit();
} elseif (mb_strlen($country) > 20 ) {
  echo "Размер данного поля не должен превышать 20 символов";
  exit();
} elseif (mb_strlen($city) > 20 ) {
  echo "Размер данного поля не должен превышать 20 символов";
  exit();
}
mysqli_query($connect_user, "UPDATE `users` SET `login` = '$login', `first_name` = '$first_name',
  `last_name` = '$last_name', `country` = '$country', `city` = '$city'  WHERE `users`.`id` = '$id'");
header('Location: /');
 ?>
