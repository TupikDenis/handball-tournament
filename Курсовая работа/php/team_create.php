<?php

require_once 'connect.php';
$id_user = $_POST['id'];
$name = $_POST['name'];
$team_number = $_POST['team_number'];
$robin = $_POST['robin'];

mysqli_query($connect_user, "INSERT INTO `tournament` (`id_tournament`, `user_id`, `tournament_name`, `team_number`, `robin`)
            VALUES (NULL, '$id_user', '$name', '$team_number', '$robin')");

$tournament_inform = mysqli_query($connect_user, "SELECT * FROM `tournament` WHERE `id_tournament` = '$connect_user->insert_id'");
$tournament_inform = mysqli_fetch_all($tournament_inform);
$inform = mysqli_query($connect_user, "SELECT * FROM `users` WHERE `id` = '$id_user'");
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
 ?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Создание команд</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
     integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <style>
     .team_create{
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
     </style>
  </head>
  <body background="../pictures/THW_RNL_Totale_f80f9_f_1920x1080.jpg">
    <div class="information">
      <div style="width: 50%; text-align: left; float: left;"> <?=$last_name?> <?=$first_name?> (<?=$country?>,<?=$city?>) </div>
    </div>
      <div class="team_create">
        <h1 align="center">Создать команды</h1>
        <form action="../php/temp.php?id_tournament=<?=$tournament_inform[0][0]?>" class="create" method="post">
          <input type="hidden" class="form-control" name="robin" id="robin" value="<?=$robin?>">
          <input type="hidden" class="form-control" name="tournament_id" id="tournament_id" value="<?=$tournament_inform[0][0]?>">
          <?php
            for($i = 0; $i < $tournament_inform[0][3]; $i++){
          ?>
            <input type="text" class="form-control" name='name_team_<?=$i ?>' placeholder="Введите название команды <?=$i+1 ?>"> <br>
          <?
            }
           ?>

          <button type="submit" class="btn btn-success" name="button">Дальше</button><br>
        </form>
      </div>
  </body>
</html>
