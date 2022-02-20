<?php
require_once 'connect.php';
$id = $_POST['id'];

mysqli_query($connect_user, "DELETE FROM `users` WHERE `users`.`id` = '$id'");
header('Location: user_view.php');

 ?>
