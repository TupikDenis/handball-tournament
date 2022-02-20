<?php
 $login = $_POST['login'];
 $password = $_POST['pass'];
 $last_name = $_POST['last_name'];
 $first_name = $_POST['first_name'];
 $country = $_POST['country'];
 $city = $_POST['city'];
 $title = $_POST['title'];


if(mb_strlen($login) < 5 || mb_strlen($login) > 15){
  echo "Размер логина должен быть от 5 до 15 символов ";
  exit();
} elseif (mb_strlen($password) < 4) {
  echo "Размер пароля должен быть от 4 символов ";
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

$mysql = new mysqli('localhost','root','root','id_registration');
$mysql->query("INSERT INTO `users` (`login`, `pass`, `last_name`, `first_name`, `country`, `city`, `session`)
VALUES ('$login', '$password', '$last_name','$first_name', '$country', '$city', '$title')");
$mysql->close();

header('Location: /')
?>
