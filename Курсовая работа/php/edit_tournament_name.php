<?php
require_once 'connect.php';
$id = $_POST['id'];
$info = $_POST['info'];
mysqli_query($connect_user, "UPDATE `tournament` SET `tournament_name` = '$info' WHERE `tournament`.`id_tournament` = '$id'");
header('Location: tournament_view.php');
 ?>
