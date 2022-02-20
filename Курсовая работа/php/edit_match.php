<?php
require_once 'connect.php';
$tournament_id = $_POST['tournament_id'];
$away_team = $_POST['away_team'];
$home_team = $_POST['home_team'];
$user_id = $_POST['id_user'];
$id_team_home = $_POST['home_id'];
$id_team_away = $_POST['away_id'];
$id_match = $_POST['id_match'];
$score_home = $_POST['home_goal'];
$score_away = $_POST['away_goal'];
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
 ?>
 <!DOCTYPE html>
 <html lang="ru">
   <head>
     <meta charset="utf-8">
     <title>Создание команд</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <style>
      .result{
        width: 50%;
        position: absolute;
        overflow: auto;
        top: 30%;
        left: 25%;
        border: 3px solid black;
        background-color: white;
        padding-left: 15px;
        padding-right: 15px;
        border-radius: 20px;
        padding: 30px;
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
        font-size: 50px;
      }
      .some{
       display:  flex;
       font-size: 14px;
     }
     .home_away{
       width: 100px;
     }
     .button{
       font-size: 40px;
     }
      </style>
   </head>
   <body background="../pictures/THW_RNL_Totale_f80f9_f_1920x1080.jpg">
     <div class="information">
       <div style="width: 50%; text-align: left; float: left;"> <?=$last_name?> <?=$first_name?> (<?=$country?>,<?=$city?>) </div>
     </div>
     <div class="result" align="center">
       <table>
         <tr>
           <th>Хозяева</th>
           <th>Счёт</th>
           <th>Счёт</th>
           <th>Гости</th>
         </tr>
         <form class="" action="edit_match_prosess.php" method="post">
           <input type="hidden" name="id_match" value="<?=$id_match?>">
           <input type="hidden" name="home_id" value="<?=$id_team_home?>">
           <input type="hidden" name="away_id" value="<?=$id_team_away?>">
           <input type="hidden" name="tournament_id" value="<?=$tournament_id?>">
         <tr>
           <td><?=$home_team?></td>
           <td><input type="number" value="<?=$score_home?>" name="home_goal" class="home_away"></td>
           <td><input type="number" value="<?=$score_away?>" name="away_goal" class="home_away"></td>
           <td><?=$away_team?></td>
         </tr>
       </table> <br>
          <input type="submit" name="button" class="button" value="Изменить">
        </form>
     </div>
   </body>
 </html>
