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
    <title>Редактирование профиля</title>
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
        <h1 align="center">Редактирование профиля</h1>
        <div class="other" style="width: 50%; text-align: center; float: left;">
           <h3 align="center">Редактирование данных</h3>
             <form action="edit_other.php" class="autorisation-registration-edit" method="post">
               <input type="hidden" class="form-control" name="id" id="id" value="<?=$id?>">
               <input type="text" class="form-control" name="login" id="login" placeholder="Измените логин" value="<?=$login?>"><br>
               <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Изменить фамилию" value="<?=$last_name?>"><br>
               <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Изменить имя" value="<?=$first_name?>"><br>
               <input type="text" class="form-control" name="country" id="country" placeholder="Изменить страну" value="<?=$country?>"><br>
               <input type="text" class="form-control" name="city" id="city" placeholder="Изменить город" value="<?=$city?>"><br>
               <button type="submit" class="btn btn-success" name="button">Изменить данные</button>
               <button type="reset" class="btn btn-success" name="button">Сбросить</button><br>
             </form>
             <form class="delete" action="delete.php" method="post">
                 <input type="hidden" class="form-control" name="id" id="id" value="<?=$id?>">
                 <button type="submit" class="btn btn-success" name="button">Удалить профиль</button><br>
             </form>
        </div>
        <div class="password" style="width: 50%; text-align: center; float: left;">
           <h3 align="center">Сменить пароль</h3>
           <form action="edit_password.php" class="autorisation-registration-edit" method="post">
             <input type="hidden" class="form-control" name="id" id="id" value="<?=$id?>">
             <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите старый пароль"><br>
             <input type="password" class="form-control" name="pass_new" id="pass_new" placeholder="Введите новый пароль"><br>
             <button type="submit" class="btn btn-success" name="button">Изменить пароль</button>
             <button type="reset" class="btn btn-success" name="button">Сбросить</button><br>
           </form>
        </div>
      </div>
  </body>
</html>
