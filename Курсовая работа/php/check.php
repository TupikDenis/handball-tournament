<?php
$login = $_POST['login'];
$password = $_POST['pass'];

$mysql = new mysqli('localhost','root','root','id_registration');

$result = $mysql->query("SELECT * FROM `users` WHERE `login`= '$login' AND `pass`= '$password'");

$user = $result->fetch_assoc();

if(count((array)$user) == 0){
  echo "Такого пользователя не существует";
  exit();
}

setcookie('users', $user['id'], time() + 7200, "/");

$mysql->close();

header ("Location: /");
?>
