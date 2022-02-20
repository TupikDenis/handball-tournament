<?php
require_once 'connect.php';
$id = $_POST['id'];
$pass = $_POST['pass'];
$pass_new = $_POST['pass_new'];
$pass_old = mysqli_query($connect_user, "SELECT `pass` FROM `users` WHERE `id` = '$id'");
$pass_old = mysqli_fetch_all($pass_old);
if ($pass_old[0][0] != $pass){
  die("Вы ввели неправильный пароль!");
  exit();
}
elseif (mb_strlen($pass_new) < 4) {
  echo "Размер пароля должен быть от 4 символов ";
  exit();
}
mysqli_query($connect_user, "UPDATE `users` SET `pass` = '$pass_new' WHERE `users`.`id` = '$id'");
header('Location: /');

 ?>
