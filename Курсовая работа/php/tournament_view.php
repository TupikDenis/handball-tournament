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
  $tournament_inform = mysqli_query($connect_user, "SELECT * FROM `tournament` WHERE `user_id` = '$id'");
  $tournament_inform = mysqli_fetch_all($tournament_inform);
 ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Создание турнира</title>
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
     .create{
       padding: 10px;
     }
     .information{
       font: normal small-caps 30px/30px fantasy;
       background-color: white;
       height: 35px;
     }
     .red{
       background-color: red;
     }
     .yellow{
       background-color: yellow;
     }
     .green{
       background-color: green;
     }
     .search{
       width: 400px;
     }
     .sort{
      display:  flex;
      font-size: 14px;
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
        <h1>Список турниров</h1>
        <form action="tournament_view_search.php" method="post">
          <input type="search" class="search" name="search" placeholder = "Введите имя турнира (для быстрого поиска)">
          <input type="submit" name="button" value="Поиск">
        </form> <br>
        <div class="sort">
        <form action="tournament_view_sort_name.php" method="post">
          <input type="submit" name="button" value="Отсортировать в алфавитном порядке">
        </form>
        <form action="tournament_view_sort_team_number.php" method="post">
          <input type="submit" name="button" value="Отсортировать по количеству команд">
        </form>
        <form action="tournament_view_sort_robin.php" method="post">
          <input type="submit" name="button" value="Отсортировать по количеству кругов">
        </form> <br> <br>
        </div>
        <table>
          <tr>
            <th>Название турнира</th>
            <th>Количество команд</th>
            <th>Количество кругов</th>
          </tr>
            <?php
              foreach ($tournament_inform as $info){
            ?>
            <tr>
              <td><?=$info[2]?></td>
              <td><?=$info[3]?></td>
              <td><?=$info[4]?></td>
              <td>
              <form class="" action="table_create.php?id_tournament=<?=$info[0]?>" method="post">
                <input type="hidden" name="tournament_id" value="<?=$info[0]?>">
                <button type="submit" name="button" class="green">Открыть</button>
              </form>
              </td>
              <td>
              <form class="" action="tournament_rename.php?id_tournament=<?=$info[0]?>" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="tournament_id" value="<?=$info[0]?>">
                <button type="submit" name="button" class="yellow">Изменить название</button>
              </form>
              </td>
              <td>
              <form class="" action="tournament_delete.php?id_tournament=<?=$info[0]?>" method="post">
                <input type="hidden" name="tournament_id" value="<?=$info[0]?>">
                <button type="submit" name="button" class="red">Удалить</button>
              </form>
              </td>
            </tr>
            <?
              }
             ?>
        </table>
      </div>
  </body>
</html>
