<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ./");
}

include "./header.php";
 ?>
 <?php include "./footer.php" ?>
 
