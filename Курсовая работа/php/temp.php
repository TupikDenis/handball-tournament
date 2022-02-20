<?php

require_once 'connect.php';
$tournament_id = $_POST['tournament_id'];
$robin = $_POST['robin'];
$tournament_inform = mysqli_query($connect_user, "SELECT * FROM `tournament` WHERE `id_tournament` = '$tournament_id'");
$tournament_inform = mysqli_fetch_all($tournament_inform);
    foreach ($tournament_inform as $info){
          $team_number = $info[3];
}

$team_info = mysqli_query($connect_user, "SELECT * FROM `tables` WHERE `tournament_id` = '$tournament_id'");
$team_info = mysqli_fetch_all($team_info);

  for($i = 0; $i < $team_number; $i++){
    if(empty($team_info[$i-1][1])){
      $team[$i] =$_POST['name_team_'.$i];
      mysqli_query($connect_user,"INSERT INTO `tables` (`id`, `tournament_id`, `team_name`, `games`, `win`, `draw`, `lose`, `your_goal`, `opponent_goal`, `different`, `points`)
           VALUES (NULL, '$tournament_id', '$team[$i]', 0, 0, 0, 0, 0, 0, 0, 0)");
      }
    if($i == $team_number-1){
        break;
    }
  }
    $team_info = mysqli_query($connect_user, "SELECT * FROM `tables` WHERE `tournament_id` = '$tournament_id'");
    $team_info = mysqli_fetch_all($team_info);
    $i=0;
    foreach ($team_info as $info){
          $team_id[$i] = $info[0];
          $team[$i] = $info[2];
          $i = $i + 1;
      }

    require_once 'robin_round.php';
    $schedule = scheduler($team);
    $count = 1;
    if (count($team) % 2 == 0){
      $t = count($team)-1;
    }
    elseif(count($team) % 2 != 0){
      $t = count($team);
    }
    $round_new = 1;
    for ($i = 0; $i < $robin; $i++){
      foreach($schedule AS $round => $games){
        foreach($games AS $play){
          if (($round+1+$i*$t) % 2 == 0){
            $temp = $play["Home"];
            $play["Home"] = $play["Away"];
            $play["Away"] = $temp;
          }
          $team_home = $play['Home'];
          $team_away = $play['Away'];
          for($j = 0; $j< $team_number; $j++){
            if($team_home == $team[$j] && $team_home != "bye"){
              $team_home_id = $team_id[$j];
            }
            if($team_away == $team[$j] && $team_away != "bye"){
              $team_away_id = $team_id[$j];
            }
          }
          mysqli_query($connect_user,"INSERT INTO `timetable` (`id`, `id_tournament`,`round`,`count`, `id_team_home`, `team_home`, `score_home`, `id_team_away`, `team_away`, `score_away`)
               VALUES (NULL, '$tournament_id', '$round_new' ,'$count','$team_home_id', '$team_home', -1, '$team_away_id', '$team_away', -1)");
          $count++;
        }
        $round_new++;
      }
    }
    header("Location: /");
?>
