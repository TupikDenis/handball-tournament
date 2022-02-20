<?php
  require_once 'connect.php';
  $id = $_COOKIE['users'];
  $inform = mysqli_query($connect_user, "SELECT * FROM `users` WHERE `id` = '$id'");
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
    <title>Создание турнира</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
     integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <style>
     .tournament_create{
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
      <div class="tournament_create">
        <h1 align="center">Создать турнир</h1>
        <form action="../php/team_create.php?id=<?=$id?>" class="create" method="post">
          <input type="hidden" class="form-control" name="id" id="id" value="<?=$id?>">
          <input type="text" class="form-control" name="name" id="name" placeholder="Введите название турнира"><br>
          <input type="number" class="form-control" min="3" max="999" step="1" name="team_number" id="team_number" placeholder="Введите количество команд (от 3 до 999)"><br>
          <input type="number" class="form-control" min="1" max="6" step="1" name="robin" id="robin" placeholder="Введите количество кругов (от 1 до 6)"><br>
          <button type="submit" class="btn btn-success" name="button">Перейти к созданию команд</button><br>
        </form>
      </div>
  </body>
</html>
