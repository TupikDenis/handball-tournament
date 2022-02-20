<?php
require_once 'connect.php';
$tournament_id = $_POST['tournament_id'];
$robin = $_POST['robin'];

$tournament_inform = mysqli_query($connect_user, "SELECT * FROM `tournament` WHERE `id_tournament` = '$tournament_id'");
$tournament_inform = mysqli_fetch_all($tournament_inform);
      foreach ($tournament_inform as $info){
              $tournament_id = $info[0];
              $user_id = $info[1];
              $tournament_name = $info[2];
              $team_number = $info[3];
              $robin = $info[4];
}

$inform = mysqli_query($connect_user, "SELECT * FROM `users` WHERE `id` = '$user_id'");
$inform = mysqli_fetch_all($inform);
      foreach ($inform as $info){
              $id = $info[0];
              $login = $info[1];
              $pass = $info[2];
              $last_name = $info[3];
              $first_name = $info[4];
              $country = $info[5];
              $city = $info[6];
      }

$team_info = mysqli_query($connect_user, "SELECT * FROM `tables` WHERE `tournament_id` = '$tournament_id' ORDER BY `points` DESC,`different` DESC, `win` DESC, `your_goal` DESC");
$team_info = mysqli_fetch_all($team_info);

for ($i = 1; $i<= $team_number; $i++){
    $id_table[$i] = $team_info[$i-1][0];
    $tournament_id_new[$i] = $team_info[$i-1][1];
    $team[$i] = $team_info[$i-1][2];
    $games[$i] = $team_info[$i-1][3];
    $win[$i] = $team_info[$i-1][4];
    $draw[$i] = $team_info[$i-1][5];
    $lose[$i] = $team_info[$i-1][6];
    $your_goal[$i] = $team_info[$i-1][7];
    $opponent_goal[$i] = $team_info[$i-1][8];
    $different[$i] = $team_info[$i-1][9];
    $points[$i] = $team_info[$i-1][10];
}

$team_info_new = mysqli_query($connect_user, "SELECT * FROM `timetable` WHERE `id_tournament` = '$tournament_id'");
$team_info_new = mysqli_fetch_all($team_info_new);

 ?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Создание команд</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
     integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <style>
     .table_create{
       width: 50%;
       position: absolute;
       overflow: auto;
       top: 15%;
       left: 25%;
       border: 3px solid black;
       background-color: white;
       padding-left: 15px;
       padding-right: 15px;
       border-radius: 20px;
     }
     .create{
       padding: 10px;
     }
     .information{
       font: normal small-caps 30px/30px fantasy;
       background-color: white;
       height: 35px;
     }
     table, th, td{
       font: normal small-caps 50px/30px;
       border: 1px solid black;
       text-align: center;
     }
     .some{
      display:  flex;
      font-size: 14px;
    }
     </style>
  </head>
  <body background="../pictures/THW_RNL_Totale_f80f9_f_1920x1080.jpg">
    <div class="information">
      <div style="width: 50%; text-align: left; float: left;"> <?=$last_name?> <?=$first_name?> (<?=$country?>,<?=$city?>) </div>
      <div style="width: 50%; text-align: right; float: left;">
        <form class="" action="../../index.php" method="post">
          <button type="submit" name="button">Главное меню</button>
        </form>
       </div>
    </div>
      <div class="table_create" align = "center">
          <h1>Турнирная таблица</h1>
          <table>
              <tr>
                <th width="40">№</th>
                <th width="200">Команда</th>
                <th width="40">И</th>
                <th width="40">П</th>
                <th width="40">Н</th>
                <th width="40">П</th>
                <th width="40">З</th>
                <th width="40">Пр</th>
                <th width="40">Р</th>
                <th width="40">О</th>
              </tr>
                <?php
                  for ($i = 1; $i<= $team_number; $i++){
                ?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$team[$i]?></td>
                  <td><?=$games[$i]?></td>
                  <td><?=$win[$i]?></td>
                  <td><?=$draw[$i]?></td>
                  <td><?=$lose[$i]?></td>
                  <td><?=$your_goal[$i]?></td>
                  <td><?=$opponent_goal[$i]?></td>
                  <td><?=$different[$i]?></td>
                  <td><?=$points[$i]?></td>
                </tr>
                <?
                  }
                 ?>
          </table> <br>
          <p><h5 style="text-align: left;">Критерий оцениваня в случаи равенства очков </h5>
            <ul>
              <li style="text-align: left;">Разница забитых и пропущенных мячей</li>
              <li style="text-align: left;">Количество побед</li>
              <li style="text-align: left;">Количество забитых мячей</li>
            </ul>
          </p>
          <h1>Расписание</h1>
          <table>
            <tr>
              <th width="40">№</th>
              <th width="40">Тур</th>
              <th width="200">Хозяева</th>
              <th width="40">Счёт</th>
              <th width="40">Счёт</th>
              <th width="200">Гости</th>
            </tr>
            <tr>
              <td colspan=6>Тур №1</td>
            </tr>
            <?php
            $count_table = 1;
            $round_number = 1;
            foreach($team_info_new as $info){
              $id_match = $info[0];
              $round = $info[2];
              $count = $info[3];
              $id_team_home = $info[4];
              $team_home = $info[5];
              $score_home = $info[6];
              $id_team_away = $info[7];
              $team_away = $info[8];
              $score_away = $info[9];
              if($round > $round_number){
                $round_number++;
              ?>
              <tr>
                <td colspan=6>Тур №<?=$round_number?></td>
              </tr>
              <?
              }
              if($team_home != "bye" && $team_away != "bye"){
            ?>
          <tr>
            <td><?=$count_table?></td>
            <td><?=$round?></td>
            <td><?=$team_home?></td>
            <td><?if($score_home != -1) {echo $score_home;}?></td>
            <td><?if($score_away != -1) {echo $score_away;}?></td>
            <td><?=$team_away?></td>
            <td><?if($score_away == -1 && $score_home == -1) {?>
              <form action="add_match.php" method="post">
                  <input type="hidden" name="id_user" value="<?=$id?>">
                  <input type="hidden" name="id_match" value="<?=$id_match?>">
                  <input type="hidden" name="tournament_id" value="<?=$tournament_id?>">
                  <input type="hidden" name="home_id" value="<?=$id_team_home?>">
                  <input type="hidden" name="away_id" value="<?=$id_team_away?>">
                  <input type="hidden" name="home_team" value="<?=$team_home?>">
                  <input type="hidden" name="away_team" value="<?=$team_away?>">
                  <input type="submit" name="button" value="Добавить счёт">
              </form>
            <?}else{?>
              <form action="edit_match.php" method="post">
                  <input type="hidden" name="id_user" value="<?=$id?>">
                  <input type="hidden" name="id_match" value="<?=$id_match?>">
                  <input type="hidden" name="tournament_id" value="<?=$tournament_id?>">
                  <input type="hidden" name="home_id" value="<?=$id_team_home?>">
                  <input type="hidden" name="away_id" value="<?=$id_team_away?>">
                  <input type="hidden" name="home_goal" value="<?=$score_home?>">
                  <input type="hidden" name="away_goal" value="<?=$score_away?>">
                  <input type="hidden" name="home_team" value="<?=$team_home?>">
                  <input type="hidden" name="away_team" value="<?=$team_away?>">
                  <input type="submit" name="button" value="Изменить счёт">
              </form>
            </td>
          </tr>
              <?
            }
              $count_table++;
            }
          }
            ?>
          </table>
      </div>
  </body>
</html>
