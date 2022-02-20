<?php
require_once 'connect.php';
$tournament_id = $_POST['tournament_id'];
$id_team_home = $_POST['home_id'];
$id_team_away = $_POST['away_id'];
$home_goal = $_POST['home_goal'];
$away_goal = $_POST['away_goal'];
$id_match = $_POST['id_match'];
$win = 2;
$draw = 1;

$home_info = mysqli_query($connect_user, "SELECT * FROM `tables` WHERE `id` = '$id_team_home'");
$home_info = mysqli_fetch_all($home_info);
foreach($home_info as $info){
  $games_home = $info[3];
  $win_number_home = $info[4];
  $draw_number_home = $info[5];
  $lose_number_home = $info[6];
  $your_goal_home = $info[7];
  $opponent_goal_home = $info[8];
  $different_home = $info[9];
  $points_home = $info[10];
}

$away_info = mysqli_query($connect_user, "SELECT * FROM `tables` WHERE `id` = '$id_team_away'");
$away_info = mysqli_fetch_all($away_info);
foreach($away_info as $info){
  $games_away = $info[3];
  $win_number_away = $info[4];
  $draw_number_away = $info[5];
  $lose_number_away = $info[6];
  $your_goal_away = $info[7];
  $opponent_goal_away = $info[8];
  $different_away = $info[9];
  $points_away = $info[10];
}

$timetable_info = mysqli_query($connect_user, "SELECT * FROM `timetable` WHERE `id_tournament` = '$tournament_id'");
$timetable_info = mysqli_fetch_all($timetable_info);

foreach($timetable_info as $info){
  if($info[0] == $id_match){
    if($home_goal > $away_goal && $info[6]>$info[9]){
      $your_goal_home = $your_goal_home - $info[6] + $home_goal;
      $opponent_goal_home = $opponent_goal_home - $info[9] + $away_goal;
      $your_goal_away = $your_goal_away - $info[9] + $away_goal;
      $opponent_goal_away = $opponent_goal_away - $info[6] + $home_goal;
      $different_home = $your_goal_home - $opponent_goal_home;
      $different_away = $your_goal_away - $opponent_goal_away;
    } elseif ($home_goal > $away_goal && $info[6]==$info[9]){
      $draw_number_away--;
      $draw_number_home--;
      $win_number_home++;
      $lose_number_away++;
      $your_goal_home = $your_goal_home - $info[6] + $home_goal;
      $opponent_goal_home = $opponent_goal_home - $info[9] + $away_goal;
      $your_goal_away = $your_goal_away - $info[9] + $away_goal;
      $opponent_goal_away = $opponent_goal_away - $info[6] + $home_goal;
      $different_home = $your_goal_home - $opponent_goal_home;
      $different_away = $your_goal_away - $opponent_goal_away;
      $points_home = $points_home + $win - $draw;
      $points_away = $points_away - $draw;
    } elseif ($home_goal > $away_goal && $info[6]<$info[9]){
      $win_number_home++;
      $lose_number_home--;
      $win_number_away--;
      $lose_number_away++;
      $your_goal_home = $your_goal_home - $info[6] + $home_goal;
      $opponent_goal_home = $opponent_goal_home - $info[9] + $away_goal;
      $your_goal_away = $your_goal_away - $info[9] + $away_goal;
      $opponent_goal_away = $opponent_goal_away - $info[6] + $home_goal;
      $different_home = $your_goal_home - $opponent_goal_home;
      $different_away = $your_goal_away - $opponent_goal_away;
      $points_home = $points_home + $win;
      $points_away = $points_away - $win;
    } elseif ($home_goal < $away_goal && $info[6]>$info[9]){
      $win_number_home--;
      $lose_number_home++;
      $win_number_away++;
      $lose_number_away--;
      $your_goal_home = $your_goal_home - $info[6] + $home_goal;
      $opponent_goal_home = $opponent_goal_home - $info[9] + $away_goal;
      $your_goal_away = $your_goal_away - $info[9] + $away_goal;
      $opponent_goal_away = $opponent_goal_away - $info[6] + $home_goal;
      $different_home = $your_goal_home - $opponent_goal_home;
      $different_away = $your_goal_away - $opponent_goal_away;
      $points_home = $points_home - $win;
      $points_away = $points_away + $win;
    } elseif ($home_goal < $away_goal && $info[6]==$info[9]){
      $draw_number_away--;
      $draw_number_home--;
      $win_number_away++;
      $lose_number_home++;
      $your_goal_home = $your_goal_home - $info[6] + $home_goal;
      $opponent_goal_home = $opponent_goal_home - $info[9] + $away_goal;
      $your_goal_away = $your_goal_away - $info[9] + $away_goal;
      $opponent_goal_away = $opponent_goal_away - $info[6] + $home_goal;
      $different_home = $your_goal_home - $opponent_goal_home;
      $different_away = $your_goal_away - $opponent_goal_away;
      $points_away = $points_away + $win - $draw;
      $points_home = $points_home - $draw;
    } elseif ($home_goal < $away_goal && $info[6]<$info[9]){
      $your_goal_home = $your_goal_home - $info[6] + $home_goal;
      $opponent_goal_home = $opponent_goal_home - $info[9] + $away_goal;
      $your_goal_away = $your_goal_away - $info[9] + $away_goal;
      $opponent_goal_away = $opponent_goal_away - $info[6] + $home_goal;
      $different_home = $your_goal_home - $opponent_goal_home;
      $different_away = $your_goal_away - $opponent_goal_away;
    } elseif ($home_goal == $away_goal && $info[6]>$info[9]){
      $draw_number_away++;
      $draw_number_home++;
      $win_number_home--;
      $lose_number_away--;
      $your_goal_home = $your_goal_home - $info[6] + $home_goal;
      $opponent_goal_home = $opponent_goal_home - $info[9] + $away_goal;
      $your_goal_away = $your_goal_away - $info[9] + $away_goal;
      $opponent_goal_away = $opponent_goal_away - $info[6] + $home_goal;
      $different_home = $your_goal_home - $opponent_goal_home;
      $different_away = $your_goal_away - $opponent_goal_away;
      $points_home = $points_home + $draw - $win;
      $points_away = $points_away + $draw;
    } elseif ($home_goal == $away_goal && $info[6]==$info[9]){
      $your_goal_home = $your_goal_home - $info[6] + $home_goal;
      $opponent_goal_home = $opponent_goal_home - $info[9] + $away_goal;
      $your_goal_away = $your_goal_away - $info[9] + $away_goal;
      $opponent_goal_away = $opponent_goal_away - $info[6] + $home_goal;
      $different_home = $your_goal_home - $opponent_goal_home;
      $different_away = $your_goal_away - $opponent_goal_away;
    } elseif ($home_goal == $away_goal && $info[6]<$info[9]){
      $draw_number_away++;
      $draw_number_home++;
      $win_number_away--;
      $lose_number_home--;
      $your_goal_home = $your_goal_home - $info[6] + $home_goal;
      $opponent_goal_home = $opponent_goal_home - $info[9] + $away_goal;
      $your_goal_away = $your_goal_away - $info[9] + $away_goal;
      $opponent_goal_away = $opponent_goal_away - $info[6] + $home_goal;
      $different_home = $your_goal_home - $opponent_goal_home;
      $different_away = $your_goal_away - $opponent_goal_away;
      $points_away = $points_away + $draw - $win;
      $points_home = $points_home + $draw;
  }
}
}

mysqli_query($connect_user, "UPDATE `tables` SET `games` = '$games_home', `win` = '$win_number_home',
  `draw` = '$draw_number_home', `lose` = '$lose_number_home', `your_goal` = '$your_goal_home',
  `opponent_goal` = '$opponent_goal_home', `different` = '$different_home', `points` = '$points_home'
   WHERE `tables`.`id` = '$id_team_home'");

mysqli_query($connect_user, "UPDATE `tables` SET `games` = '$games_away', `win` = '$win_number_away',
  `draw` = '$draw_number_away', `lose` = '$lose_number_away', `your_goal` = '$your_goal_away',
  `opponent_goal` = '$opponent_goal_away', `different` = '$different_away', `points` = '$points_away'
   WHERE `tables`.`id` = '$id_team_away'");

mysqli_query($connect_user, "UPDATE `timetable` SET `score_home` = '$home_goal', `score_away` = '$away_goal'
   WHERE `timetable`.`id` = '$id_match'");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="table_create.php" method="post">
      <input type="hidden" name="tournament_id" value="<?=$tournament_id?>">
      <button type="submit" name="button">Нажмите, чтобы продолжить</button>
    </form>
  </body>
</html>
