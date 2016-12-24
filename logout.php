<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("refresh:2; ./index.php");
    ?><h1> You are not logged in ! Wait 2 seconds... </h1> <?php
  }
  else{
    session_unset();
    session_destroy();
    header("refresh:2; ./index.php");
    ?><h1> Successfully logged out ! Wait 2 seconds... </h1> <?php
  }
 ?>
