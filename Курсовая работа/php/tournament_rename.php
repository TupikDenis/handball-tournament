<?php
  require_once 'connect.php';
  $id = $_POST['id'];
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
  $tournament_id = $_POST['tournament_id'];
  $tournament_inform = mysqli_query($connect_user, "SELECT * FROM `tournament` WHERE `id_tournament` = '$tournament_id'");
  $tournament_inform = mysqli_fetch_all($tournament_inform);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Редактирование названия турнира</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
     integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <style>
     .edit{
       width: 75%;
       position: absolute;
       overflow: auto;
       top: 15%;
       left: 13%;
       border: 3px solid black;
       background-color: white;
       padding-left: 15px;
       padding-right: 15px;
       border-radius: 20px;
     }
     .autorisation-registration-edit{
       padding: 10px;
     }
     .other{
       border-right: 3px solid black;
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
      <div class="edit">
        <h1 align="center">Редактирование названия турнира</h1>
             <form action="edit_tournament_name.php" class="autorisation-registration-edit" method="post">
               <input type="hidden" class="form-control" name="id" id="id" value="<?=$tournament_id?>">
               <input type="text" class="form-control" name="info" id="info" placeholder="Изменить название турнира" value="<?=$tournament_inform[0][2]?>"><br>
               <button type="submit" class="btn btn-success" name="button">Изменить данные</button>
               <button type="reset" class="btn btn-success" name="button">Сбросить</button><br>
             </form>
        </div>
  </body>
</html>
