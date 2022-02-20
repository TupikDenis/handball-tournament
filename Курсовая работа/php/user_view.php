<?php
  require_once 'connect.php';
  $id = $_COOKIE['users'];
  $my_inform = mysqli_query($connect_user, "SELECT * FROM `users` WHERE `id` = '$id'");
  $my_inform = mysqli_fetch_all($my_inform);
  foreach ($my_inform as $info){
        $id = $info[0];
        $login = $info[1];
        $pass = $info[2];
        $last_name = $info[3];
        $first_name = $info[4];
        $country = $info[5];
        $city = $info[6];
  }
  $inform = mysqli_query($connect_user, "SELECT * FROM `users`");
  $inform = mysqli_fetch_all($inform);
 ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Просмотр всех пользователей</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
     integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <style>
     .tournament_info{
       width: 60%;
       position: absolute;
       overflow: auto;
       top: 15%;
       left: 22.5%;
       border: 3px solid black;
       background-color: white;
       padding-left: 15px;
       padding-right: 15px;
      border-radius: 20px;
     }
     .information{
       font: normal small-caps 30px/30px fantasy;
       background-color: white;
       height: 35px;
     }
     .red{
       background-color: red;
     }
     table, th, td{
       font: normal small-caps 50px/30px;
       border: 1px solid black;
       text-align: center;
     }
     </style>
  </head>
  <body background="../pictures/THW_RNL_Totale_f80f9_f_1920x1080.jpg">
    <div class="information">
      <div style="width: 50%; text-align: left; float: left;"> <?=$last_name?> <?=$first_name?> (<?=$country?>,<?=$city?>) </div>
    </div>
      <div class="tournament_info" align="center">
        <h1>Список пользователей</h1>
        <table>
          <tr>
            <th>Логин пользователя</th>
            <th>Имя пользователя</th>
          </tr>
            <?php
              foreach ($inform as $info){
                if ($info[0] != $id){
            ?>
            <tr>
              <td><?=$info[1]?></td>
              <td><?=$info[3]?></td>
              <td>
              <form action="delete_user.php" method="post">
                <input type="hidden" name="id" value="<?=$info[0]?>">
                <button type="submit" name="button" class="red">Удалить</button>
              </form>
            </tr>
            <?
                }
              }
             ?>
        </table>
      </div>
  </body>
</html>
