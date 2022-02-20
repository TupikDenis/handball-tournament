<?php
session_start();
$_SESSION['title'] = "ghost";
if(isset($_SESSION['title'])){
  header("Location: /");
  exit;
}
?>
