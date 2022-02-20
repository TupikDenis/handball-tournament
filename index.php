<?php
unset($_SESSION['title']);
session_start();
  require_once 'Курсовая работа/php/connect.php';
 ?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Главная страница</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
     integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <style>
     .autorisation{
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
     .autorisation-registration-edit{
       padding: 10px;
     }
     div{
       background-color: white;
     }
     .buttons{
       width: 35%;
       position: absolute;
       top: 30%;
       left: 32.5%;
       border: 3px solid black;
       background-color: white;
       text-align: center;
       border-radius: 20px;
     }
     .information{
       font: normal small-caps 30px/30px fantasy;
       background-color: white;
       height: 35px;
     }
     </style>
  </head>
  <body background="Курсовая работа/pictures/THW_RNL_Totale_f80f9_f_1920x1080.jpg">
    <div class="main mt-6">
      <?php
      if (!empty($_COOKIE['users']) || $_SESSION['title']=="ghost") {
          $id = $_COOKIE['users'];
          $inform = mysqli_query($connect_user, "SELECT * FROM `users` WHERE `id`= '$id'");
          $inform = mysqli_fetch_all($inform);
          foreach ($inform as $info){
                $id = $info[0];
                $login = $info[1];
                $pass = $info[2];
                $last_name = $info[3];
                $first_name = $info[4];
                $country = $info[5];
                $city = $info[6];
                $_SESSION['title'] = $info[7];
          }
        ?>
          <div class="information">
            <?php if ($_SESSION['title'] == "admin" || $_SESSION['title'] == "user"){ ?>
            <div style="width: 50%; text-align: left; float: left;"> Приветствую, <?=$first_name?> </div>
            <div style="width: 50%; text-align: right; float: left;"> <a href="Курсовая работа/php/edit.php?id=<?=$id?>"> Редактировать профиль </a>
               | <a href="Курсовая работа/php/exit.php"> Выход </a> </div>
            <?php }
              elseif($_SESSION['title'] == "ghost"){
            ?>
              <div style="width: 50%; text-align: left; float: left;"> Приветствую, гость </div>
              <div style="width: 50%; text-align: right; float: left;"> <a href="Курсовая работа/php/exit_ghost.php"> Выход </a> </div>
            <?php } ?>
          </div>
          <div class="buttons">
            <h1 align="center">Меню</h1>
            <?php if ($_SESSION['title'] == "admin" || $_SESSION['title'] == "user"){ ?>
            <form action="Курсовая работа/php/tournament_create.php?id=<?=$id?>" class="autorisation-registration-edit" method="post">
              <button type="submit" class="btn btn-success" name="button"> Создать турнир </button><br>
            </form>
            <form action="Курсовая работа/php/tournament_view.php?id=<?=$id?>" class="autorisation-registration-edit" method="post">
              <button type="submit" class="btn btn-success" name="button"> Посмотреть турниры </button><br>
            </form>
          <?php } ?>
            <form action="Курсовая работа/html/info.html" class="autorisation-registration-edit" method="post">
              <button type="submit" class="btn btn-success" name="button"> О разработчике </button><br>
            </form>
            <?php if ($_SESSION['title'] == "admin"){ ?>
            <form action="Курсовая работа/php/user_view.php" class="autorisation-registration-edit" method="post">
              <button type="submit" class="btn btn-success" name="button"> Все пользователи </button><br>
            </form>
          <?php } ?>
          </div>
      <?php
    }else{
  		?>
      <div class="autorisation">
        <h1 align="center">Авторизация</h1>
        <form action="Курсовая работа/php/check.php" class="autorisation-registration-edit" method="post">
          <input align="center" type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
          <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
          <button type="submit" class="btn btn-success" name="button">Войти</button><br>
          <a href="Курсовая работа/html/registration.html"> Зарегистрироваться </a> <br>
          <a href="Курсовая работа/php/ghost.php"> Войти как гость </a>
        </form>
      </div>
    </div>

    <?php  } ?>
  </body>
</html>
