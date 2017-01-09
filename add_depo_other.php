<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ./");
}
include "./header.php";

 ?>
 <div class="container" style="text-align:center">
   <header>
     <h2 class="alt" style="text-align:center">SEITUku</h2>
     <a href="./administrator.php"><button class="button">Go back to Administrator Main Page </button></a>
   </header>

   <form action="./action_add_depo_other.php" method="post">
     <?php if (isset($_GET['depositrecordsuccess'])) echo "<h1> <mark>Deposit Recorded Successfully !</mark> </h1>" ?>
    <input type="text" name="studentID" placeholder="Student ID" style="text-align:center" required>
    Date of deposit : <input type="date" name="date"><br>
    <input type="number" name="amount" placeholder="Amount of Deposit" style="width:400px" required><br>
    <input type="submit" value="Record Deposit">
    </form>
 </div>
 <?php include "./footer.php" ?>
