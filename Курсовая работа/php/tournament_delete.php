<?php
require_once 'connect.php';
$id = $_POST['tournament_id'];

mysqli_query($connect_user, "DELETE FROM `tournament` WHERE `tournament`.`id_tournament` = '$id'");
header('Location: tournament_view.php');

 ?>
