<?php
  session_start();
  if (isset($_SESSION['id'])) {
  	if ($_SESSION['roleId'] == 1) {
  		header("Location: ./administrator.php");
  	} else if ($_SESSION['roleId'] == 2) {
  		header("Location: ./depositor.php");
  	}
  	die("Redirected");
  }

  include './header.php';
 ?>
 <div class="container">

   <header>
     <h2 class="alt" style="text-align:center">SEITUku</h2>
     <p style="text-align:center">Online Deposit System for SEITU 2017</p>
   </header>

   <footer>
     <div style="text-align:center">
        <form action="./login.php" method="post">
        <input type="text" name="username" placeholder="Student ID" style="text-align:center">
        <br>
        <input type="password" name="password" placeholder="Password" style="text-align:center">
        <br><br>
        <input type="submit" class="button" value="Login">
     </form>
      </div>
   </footer>

 </div>
 <?php include "./footer.php" ?>
