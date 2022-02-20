<?php
  setcookie('users', $user['name'], time() - 7200, "/");
  header ("Location: /");
 ?>
