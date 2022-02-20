<?php
require_once 'connect.php';
$start_id = $_POST['start_id'];
$count = $_POST['count'] + $start_id;
$tournament_id = $_POST['tournament_id'];
for($i = $start_id; $i< $count; $i++){
  $id[$i] = $_POST['id'.$i];
  $name_team[$i] = $_POST['name_team_'.$i];
  print_r($name_team[$i]);
  mysqli_query($connect_user, "UPDATE `tables` SET `id`='$id[$i]' `team_name` = '$name_team[$i]'
    WHERE `tables`.`tournament_id` = '$tournament_id'");
  if($i == $count-1){
    header('Location: table_create.php');
  }
}
 ?>
