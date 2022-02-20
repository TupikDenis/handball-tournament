<?php
$connect_user = mysqli_connect('localhost', 'root', 'root', 'id_registration');

if (!$connect_user){
  die('Ошибка соединения с базой данных');
}
?>
